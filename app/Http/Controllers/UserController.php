<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User::get();


        return view('dashboard.user.home', compact('users'));
    }

    function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
