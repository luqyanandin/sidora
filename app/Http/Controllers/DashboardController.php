<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index()
    {
        // $user=User::all();
        // dd($user[0]->userlevel);
        return view('user.v_dashboard');
    }
}
