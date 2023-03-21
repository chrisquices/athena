<?php

namespace App\Http\Controllers;

use App\Models\Contrato;
use App\Models\ContratoUser;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('name')->get();

        // $persons =

        return view('mantenimiento-seguridad.referenciales-sistema.usuarios.index', compact('users'));
    }

    public function create()
    {
        $data['contratos'] = Contrato::where('estado', 'Activo')->get();

        return view('mantenimiento-seguridad.referenciales-sistema.usuarios.create', $data);
    }

    public function show(User $user)
    {
        $contratos = ContratoUser::with('contrato')
            ->where([
                ['estado', 'Activo'],
                ['user_id', $user->id]
            ])->get();

        return view('mantenimiento-seguridad.referenciales-sistema.usuarios.show', compact('user', 'contratos'));
    }

    public function edit(User $user)
    {
        $data['user'] = $user;
        $data['contratos'] = Contrato::where('estado', 'Activo')->get();

        return view('mantenimiento-seguridad.referenciales-sistema.usuarios.edit', $data);
    }

    public function store(Request $request, User $user)
    {
        $validator = $request->validate([
            'name' => [
                'required',
                'between:1,255',
                'regex:/^[\pL\s\-]+$/u',
            ],
            'lastname' => [
                'required',
                'between:1,255',
                'regex:/^[\pL\s\-]+$/u',
            ],
            'role' => [
                'required',
            ],
            'email' => [
                'required',
                'email'
            ],
            'password' => [
                'required',
                'confirmed'
            ],
        ]);

        $user->name = $request->name;
        $user->lastname = $request->lastname;
        $user->role = $request->role;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();

        return redirect('mantenimiento-seguridad/referenciales-sistema/usuarios')->with('success', 'success');
    }

    public function update(Request $request, User $user)
    {
        $validator = $request->validate([
            'name' => [
                'required',
                'between:1,255',
                'regex:/^[\pL\s\-]+$/u',
            ],
            'lastname' => [
                'required',
                'between:1,255',
                'regex:/^[\pL\s\-]+$/u',
            ],
            'role' => [
                'required',
            ],
            'email' => [
                'required',
                'email'
            ],
        ]);

        $user->name = $request->name;
        $user->lastname = $request->lastname;
        $user->role = $request->role;
        $user->email = $request->email;
        $user->photo = 'default.jpg';

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect('mantenimiento-seguridad/referenciales-sistema/usuarios')->with('success', 'success');
    }

    public function assign(User $user) {
        $data['user'] = $user;

        $data['contratos_ocupados'] = ContratoUser::where('user_id', $user->id)->pluck('contrato_id')->toArray();

        $data['contratos'] = Contrato::where('estado', 'Activo')->whereNotIn('id', $data['contratos_ocupados'])->get();

        return view('mantenimiento-seguridad.referenciales-sistema.usuarios.assign', $data);
    }

    public function assignStore(Request $request) {
        $validator = $request->validate([
            'contrato_id' => [
                'required',
            ],
            'user_id' => [
                'required',
            ],
        ]);

        $contrato_user = new ContratoUser;

        $contrato_user->contrato_id = $request->contrato_id;
        $contrato_user->user_id = $request->user_id;

        $contrato_user->save();

        return redirect('mantenimiento-seguridad/referenciales-sistema/usuarios')->with('success', 'success');
    }
//
//    public function unassign(User $user) {
//        $data['user'] = $user;
//
//        $data['contratos_ocupados'] = ContratoUser::where('user_id', Auth::user()->id)->pluck('contrato_id')->toArray();
//
//        $data['contratos'] = Contrato::where('estado', 'Activo')->whereIn('id', $data['contratos_ocupados'])->get();
//
//        return view('mantenimiento-seguridad.referenciales-sistema.usuarios.unassign', $data);
//    }
//
//    public function unassignStore(Request $request) {
//        $contrato_user = ContratoUser::where([
//            ['contrato_id', $request->contrato_id],
//            ['user_id', Auth::user()->id]
//        ])->delete();
//
//        $contrato_user->estado = 'Anulado';
//
//        $contrato_user->save();
//
//        return redirect('mantenimiento-seguridad/referenciales-sistema/usuarios')->with('success', 'success');
//    }

    public function reset(User $user)
    {
        $user->verified = false;
        $user->failed_attempt = 0;

        $user->save();

        return redirect('mantenimiento-seguridad/referenciales-sistema/usuarios')->with('success', 'success');
    }

    public function block(User $user)
    {
        $user->status = 'Bloqueado';

        $user->save();

        return redirect('mantenimiento-seguridad/referenciales-sistema/usuarios')->with('success', 'success');
    }

    public function unblock(User $user)
    {
        $user->status = 'Activo';

        $user->save();

        return redirect('mantenimiento-seguridad/referenciales-sistema/usuarios')->with('success', 'success');
    }

    public function delete(User $user)
    {
        try {
            $user->delete();

            return redirect('mantenimiento-seguridad/referenciales-sistema/usuarios')->with('success', 'success');
        } catch (\Illuminate\Database\QueryException $e) {

            return redirect('mantenimiento-seguridad/referenciales-sistema/usuarios')->with('error', 'error');
        }
    }
}
