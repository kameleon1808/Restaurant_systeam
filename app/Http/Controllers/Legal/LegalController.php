<?php

namespace App\Http\Controllers\Legal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LegalController extends Controller
{
    public function index()
    {
        return view('dashboard.legal.home');
    }

    function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
