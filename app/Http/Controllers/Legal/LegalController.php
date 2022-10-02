<?php

namespace App\Http\Controllers\Legal;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LegalController extends Controller
{
    public function index()
    {
        $users = User::get();
        $art = Article::inRandomOrder()->limit(3)->get();


        return view('dashboard.legal.home', compact('users', 'art'));
    }

    public function profile()
    {
        return view('dashboard.legal.profile');
    }

    public function updateInformation(Request $request)
    {
        $email = $request->input('email');
        $name = $request->input('name');
        $address = $request->input('address');
        $phone = $request->input('phone');
        $company_name = $request->input('company_name');


        $query = User::where('id', Auth::id())
            ->update([
                'email' => $email,
                'name' => $name,
                'address' => $address,
                'phone' => $phone,
                'company_name' => $company_name,
            ]);

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
                echo "<script>
                        alert('Password successful changed!');
                        window.location.href='profile';
                    </script>";
            } else {
                // return redirect('user/edit-pwd');
                // return view('dashboard.user.nottification', ['prom' => 'Sifre se ne poklapaju!']);
                // return dd('New password and old password dont match');
                echo "<script>
                        alert('New password and old password dont match!');
                        window.location.href='profile';
                    </script>";
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
            User::where('id', $id)->delete();

            echo "<script>
                        alert('Account is delleted!');
                        window.location.href='/login';
                    </script>";
        } catch (Exception $exception) {
            // dd($exception->getMessage());
            return view('dashboard.legal.nottification', ['prom' => $exception]);
        }
    }

    function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
