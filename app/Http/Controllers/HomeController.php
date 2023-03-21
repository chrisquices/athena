<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Institution;
use App\Models\Notice;
use App\Models\User;
use App\Models\RoleUser;

class HomeController extends Controller
{
    public function index()
    {
        $user = User::where('id', auth()->user()->id)->first();

        return view('home', compact('user'));
    }
}
