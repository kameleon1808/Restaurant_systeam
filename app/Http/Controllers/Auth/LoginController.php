<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    protected function redirectTo()
    {
        if (Auth()->user()->role == 1) {
            return  redirect()->route('boss.home');
        } elseif (Auth()->user()->role == 2) {
            return  redirect()->route('user.index');
        } elseif (Auth()->user()->role == 5) {
            return  redirect()->route('legal.index');
        } elseif (Auth()->user()->role == 3) {
            return  redirect()->route('waiter.home');
        } elseif (Auth()->user()->role == 4) {
            return  redirect()->route('state.home');
        } elseif (Auth()->user()->role == 6) {
            return  redirect()->route('rest-boss.home');
        }
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest')->except('logout');
        // $this->middleware('guest');
        // $this->middleware('auth');
    }

    public function login(Request $request)
    {
        $input = $request->all();
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (auth()->attempt(array('email' => $input['email'], 'password' => $input['password']))) {
            if (auth()->user()->role == 1) {
                return Redirect::to('boss/home');
            } else if (auth()->user()->role == 2) {
                return Redirect::to('user/home');
            } else if (auth()->user()->role == 3) {
                return Redirect::to('waiter/home');
            } else if (auth()->user()->role == 4) {
                return Redirect::to('state/home');
            } else if (auth()->user()->role == 5) {
                return Redirect::to('legal/home');
            } else if (auth()->user()->role == 6) {
                return Redirect::to('rest-boss/home');
            } else {
                return redirect()->route('login')->with('error', 'Nesto ne valja');
            }
        }
    }

    function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
