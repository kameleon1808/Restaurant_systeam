<?php

namespace App\Http\Controllers\Waiter;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class OrderController extends Controller
{
    public function showOrders()
    {
        $id_waiter = auth()->guard()->user()->location_id;
        // dd($id_waiter);

        $orders = DB::table('locations')
            ->select()
            ->join('orders', 'orders.location_id', 'locations.id')
            // ->join('users', 'users.location_id', 'locations.id')/////
            ->where('orders.location_id', '=', $id_waiter)
            // ->whereRaw('order_date <= now() - interval 5 minute')
            ->orderBy('orders.order_date', 'desc')
            ->get();
        // dd($orders);

        return view('dashboard.waiter.orders', compact('orders'));
    }

    public function createOrder(Request $request)
    {
        $o = new Order();
        $o->location_id = auth()->guard()->user()->location_id;
        $o->comments = "Rucno unesena porudzbina!";
        $o->price = $request->input('price');
        $o->article_name = $request->input('article_name');;
        $o->prod_qty = $request->input('prod_qty');
        $o->save();
        // dd($o);

        return redirect()->back()->with('success', 'Dodali ste porudzbinu!');
    }

    public function accept(Request $request)
    {
        $order_id = $request->input('order_id');
        $order_date = $request->input('order_date');

        // dd($order_date);

        $orders = DB::table('orders')
            ->where('orders.id', '=', $order_id)
            ->update(['orders.accepted' => 'PRIHVACENA', 'order_date' => $order_date]);

        return redirect()->back()->with('success', 'Prihvatili ste porudzbinu!');
    }

    public function refuse(Request $request)
    {
        $order_id = $request->input('order_id');
        $order_date = $request->input('order_date');

        // dd($order_date);

        $orders = DB::table('orders')
            ->where('orders.id', '=', $order_id)
            ->update(['orders.accepted' => 'Prihvati', 'order_date' => $order_date]);

        return redirect()->back()->with('success', 'Prihvatili ste porudzbinu!');
    }

    public function indexx(Request $request)
    {
        /* $ip = $request->ip(); Dynamic IP address */
        // $ip = '162.159.24.227'; /* Static IP address */
        // $currentUserInfo = Location::get();

        return view('dashboard.waiter.map');
    }
}
