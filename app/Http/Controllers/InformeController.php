<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\AsignaturaMallaCurricular;
use App\Models\Grado;
use App\Models\MallaCurricular;
use App\Models\Sede;
use Illuminate\Http\Request;

class InformeController extends Controller
{
    public function index()
    {
        return view('informes.index');
    }
}
