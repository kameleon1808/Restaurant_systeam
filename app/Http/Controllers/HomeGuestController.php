<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeGuestController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('guest');
    // }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        // $restaurants = DB::table('restaurants')
        //     ->select('name')
        //     ->distinct()
        //     ->get();

        // return  response()->view('dashboard.home', compact(['restaurants']));
        return view('auth.login');
    }

    public function redirectToAddress($address)
    {
        $locations = DB::table('locations')
            ->select()
            ->join('restaurants', 'restaurants.location_id', '=', 'locations.id')
            ->where('restaurants.name', $address)
            ->get();
        // dd($locations);

        return  response()->view('dashboard.address', compact('locations'));
    }

    public function loginOption()
    {
        return  response()->view('dashboard.role');
    }
    //===========================================================

}
