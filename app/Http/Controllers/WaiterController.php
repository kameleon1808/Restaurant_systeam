<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WaiterController extends Controller
{
    public function index()
    {
        return view('dashboard.waiter.home');
    }
    
     public function indexx(Request $request)
    {
        /* $ip = $request->ip(); Dynamic IP address */
        // $ip = '162.159.24.227'; /* Static IP address */
        // $currentUserInfo = Location::get();

        return view('dashboard.waiter.map');
    }

    function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
