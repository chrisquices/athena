<?php

namespace App\Helpers;

use App\Models\Log;
use Session;

class AppHelper
{
    public function logUserAccess($request)
    {
        $log = new Log;

        $log->email = $request->email;
        $log->ip_address = $_SERVER['REMOTE_ADDR'];
        $log->description = 'Ingreso de ' . $request->email . ' desde la dirección IP ' . $_SERVER['REMOTE_ADDR'] . ' en la fecha y hora ' . now();

        $log->save();
    }

    public function logUserActivity($tabla, $accion)
    {
        $log = new Log;

        $log->email = auth()->user()->email;
        $log->ip_address = $_SERVER['REMOTE_ADDR'];
        $log->description = 'El usuario ' . auth()->user()->email . ' ha realizado una ' . $accion  . ' en la tabla ' . $tabla . ' desde la dirección IP ' . $_SERVER['REMOTE_ADDR'] . ' en la fecha y hora ' . now();

        $log->save();
    }

    public static function instance()
    {
        return new AppHelper();
    }
}
