<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User::get();
        $art = Article::inRandomOrder()->limit(3)->get();


        return view('dashboard.user.home', compact('users', 'art'));
    }

    function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
