<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::get();
        $art = Article::inRandomOrder()->limit(3)->get();


        return view('dashboard.user.home', compact('users', 'art'));
    }

    public function profile()
    {
        return view('dashboard.user.profile');
    }

    public function updateInformation(Request $request)
    {
        $email = $request->input('email');
        $name = $request->input('name');
        $address = $request->input('address');
        $phone = $request->input('phone');

        $query = User::where('id', Auth::id())
            ->update(['email' => $email, 'name' => $name, 'address' => $address, 'phone' => $phone,]);

        return redirect()->back();
    }


    public function update(Request $request)
    {
        try {
            $data = Auth::user();
            $pwd = $request->input('pwd'); //unesena stara za potvrdu
            $pwd_new = $request->input('pwd_new'); //novounesena

            if (Hash::check($pwd, $data->password)) {
                $query = User::where('id', $data->id)->first();
                $query->password = Hash::make($pwd_new);
                $query->update();

                // return redirect('user/home')->with('status', 'Sifra izmenjena');
                // return view('dashboard.user.nottification', ['prom' => 'Sifra izmenjena!']);
                return redirect()->back();
            } else {
                // return redirect('user/edit-pwd');
                // return view('dashboard.user.nottification', ['prom' => 'Sifre se ne poklapaju!']);
                return dd('New password and old password dont match');
            }
        } catch (Exception $exception) {
            dd($exception->getMessage());
            // return view('dashboard.user.nottification', ['prom' => $exception]);
        }
    }


    function delete()
    {
        try {
            $id = Auth::id();
            user::where('id', $id)->delete();

            return redirect('/');
        } catch (Exception $exception) {
            // dd($exception->getMessage());
            return view('dashboard.user.nottification', ['prom' => $exception]);
        }
    }

    function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
