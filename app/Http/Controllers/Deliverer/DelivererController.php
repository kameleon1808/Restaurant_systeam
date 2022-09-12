<?php

namespace App\Http\Controllers\Deliverer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\OrderLocation;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Redirect;

class DelivererController extends Controller
{
    public function index()
    {
        return view('dashboard.boss.home');
    }

    public function getLocation(Request $request)
    {
        // $user_id = auth()->user()->id;
        // $data = OrderLocation::where('boss_id', null)->orWhere('boss_id', $user_id)->get();
        // $param2 = $request->input('loc');
        // dd($data);

        return view('dashboard.boss.home');
    }

    public function showOrder(Request $request)
    {
        $user_id = auth()->user()->id;
        $data = OrderLocation::where('boss_id', null)
            ->join('orders', 'orders.id', '=', 'order_locations.order_id')
            ->orWhere('boss_id', $user_id)
            ->orderBy('orders.order_date', 'desc')
            ->get();
        $param2 = $request->input('loc');
        // dd($data);

        return view('dashboard.boss.home', compact('data', 'param2'));
    }

    public function acceptOrder(Request $request)
    {
        $ord_id = $request->input('ord_id');
        $user_id = auth()->user()->id;

        $query = DB::table('order_locations')
            ->where('order_locations.id', '=', $ord_id)
            ->update(['order_locations.boss_id' => $user_id]);


        return redirect()->back();
    }

    public function sendLocation(Request $request)
    {
        $ord_id = $request->input('ord_id');
        $loc = $request->input('loc');
        $user_id = auth()->user()->id;
        // dd($loc);

        $query = DB::table('order_locations')
            ->where('order_locations.id', '=', $ord_id)
            ->update(['order_locations.location' => $loc, 'order_locations.request' => null, 'order_locations.created_at' => Carbon::now()]);

        return Redirect::to('boss/home');
    }

    public function finishDelivery(Request $request)
    {
        $ord_id = $request->input('ord_id');
        $user_id = auth()->user()->id;
        // dd($loc);

        $query = DB::table('order_locations')
            ->where('order_locations.id', '=', $ord_id)
            ->update(['order_locations.delievered' => 1]);

        return redirect()->back();
    }

    public function location(Request $request)
    {
        $id = $request->input('ord_id');

        return view('dashboard.boss.location', compact('id'));
    }


    function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
