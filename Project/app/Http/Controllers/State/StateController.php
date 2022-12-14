<?php

namespace App\Http\Controllers\State;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StateController extends Controller
{
    public function index()
    {
        return view('dashboard.state.home');
    }

    function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
