<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Lang;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Models\Sede;
use App\Models\User;
use App\Helpers\AppHelper;
use DB;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        $sedes = Sede::where('estado', 'Activo')->get();

        return view('auth.login', compact('sedes'));
    }

    protected function authenticated(Request $request)
    {
        $sede_id = $request->sede_id;

        $sede = Sede::find($sede_id);

        session()->put('sede_id', $sede->id);
        session()->put('sede_nombre', $sede->nombre);
        session()->put('sede_acronimo', $sede->acronimo);

        $user = User::find(Auth::user()->id);

        $user->last_login = now();

        $user->save();

        return redirect('/');
    }


    protected function attemptLogin(Request $request)
    {
        AppHelper::instance()->logUserAccess($request);

        $user = User::where('email', $request->email)->first();

        if ($user == null) {
            throw ValidationException::withMessages([
                $this->username() => [Lang::get('auth.unknown')],
            ])->status(Response::HTTP_TOO_MANY_REQUESTS);
        }

        if ($user->status == 'Bloqueado') {
            throw ValidationException::withMessages([
                $this->username() => [Lang::get('auth.throttle')],
            ])->status(Response::HTTP_TOO_MANY_REQUESTS);
        } elseif ($user->status == 'Inactivo') {
            throw ValidationException::withMessages([
                $this->username() => [Lang::get('auth.inactive')],
            ])->status(Response::HTTP_TOO_MANY_REQUESTS);
        } else {
            return $this->guard()->attempt(
                $this->credentials($request),
                $request->filled('remember')
            );
        };
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        $failed_attempt = User::where('email', $request->email)->first();

        if ($failed_attempt->failed_attempt == 2) {
            DB::update('UPDATE users SET status = "Bloqueado" WHERE email = "' . $request->email . '"');

            throw ValidationException::withMessages([
                $this->username() => [trans('auth.failed')],
            ]);
        } else {
            DB::update('UPDATE users SET failed_attempt = failed_attempt + 1 WHERE email = "' . $request->email . '"');

            throw ValidationException::withMessages([
                $this->username() => [trans('auth.failed')],
            ]);
        }
    }

    public function logout()
    {
								$user = User::find(Auth::user()->id);

        $user->last_logout = now();

        $user->save();

        Auth::logout();
        return redirect()->to('/');
    }
}
