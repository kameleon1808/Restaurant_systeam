<?php

namespace App\Http\Controllers\Legal;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderLocation;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function empty_cart()
    {
        try {
            $user_id = Auth::id();

            $orders = DB::table('carts')
                ->where('carts.confirmed', '=', 0)
                ->where('carts.user_id', '=', $user_id)
                ->update(['carts.confirmed' => 1]);
        } catch (Exception $exception) {
            dd($exception->getMessage());
            // return view('dashboard.user.nottification', ['prom' => $exception]);
        }
    }

    public function create(Request $request)
    {
        try {
            DB::beginTransaction();
            //--------------------------------

            $datasave = Order::create([
                'user_id' => auth()->guard()->user()->id,
                'comments' => $request->comments,
                'shipping_address' => $request->address,
                'name' => auth()->guard()->user()->name,
                // 'cart_id' => json_encode($cart_id),
                // 'prod_qty' => json_encode($prod_qty),
                // 'article_name' => json_encode($article_name)
                'price' => $request->total_price,
                'phone' => auth()->guard()->user()->phone,
                'location_id' => 1,  //============================LAST C
                'cart_id' => implode(" - ", $request->cart_id),
                'prod_qty' => implode(" - ", $request->prod_qty),
                'article_name' => implode(" - ", $request->article_name)
            ]);

            // dd($datasave);

            $order_loc = OrderLocation::create([
                'user_id' => $datasave->user_id,
                'location_id' => 1,
                'order_id' => $datasave->id,
                'city' => 'Beograd',
            ]);
            //---------------------------------------------------------------------------
            // $userr = User::where('role', 3)->where('location_id', 1)->get();
            // Notification::send($userr, new OrderNotification);
            //---------------------------------------------------------------------------
            DB::commit();

            // Mail::to("dostava.pepenero@gmail.com")->send(new TestMail($datasave));
            $this->empty_cart();
            echo "<script>
                        alert('Order created!');
                        window.location.href='/legal/order';
                    </script>";
            // return view('dashboard.user.nottification', ['prom' => 'Vaša porudžbina je kreirana, možete je očekivati uskoro!']);
        } catch (Exception $exception) {
            dd($exception->getMessage());
            // return view('dashboard.user.nottification', ['prom' => $exception]);
        }
    }

    public function show(Request $request)
    {
        try {
            $user = Auth::user();
            $data = Order::where('user_id', $user->id)
                ->where('canceled', 0)
                // ->where('delievered', 0)
                ->whereRaw('order_date >= now() - interval 55 minute')
                ->latest('created_at')
                ->get();

            $order_loc =  DB::table('order_locations')
                ->select()
                ->where('order_locations.user_id', '=', $user->id)
                ->where('delievered', 0)
                ->where('canceled', 0)
                ->whereRaw('created_at >= now() - interval 55 minute')
                ->latest('created_at')
                ->get();
            // dd($data, $order_loc);

            return view('dashboard.legal.order', compact('user', 'data', 'order_loc'));
        } catch (Exception $exception) {
            dd($exception->getMessage());
            // return view('dashboard.user.nottification', ['prom' => $exception]);
        }
    }

    public function locate(Request $request)
    {
        try {
            $order_loc_id = $request->input('order_loc_id');

            $orders = DB::table('order_locations')
                ->where('order_locations.id', '=', $order_loc_id)
                ->update(['order_locations.request' => 1]);

            return redirect()->back();
            // return view('dashboard.user.nottification', ['prom' => 'Zahtev za lociranje je poslat!']);
        } catch (Exception $exception) {
            dd($exception->getMessage());
            // return view('dashboard.user.nottification', ['prom' => $exception]);
        }
    }

    public function cancel(Request $request)
    {
        try {
            $order_id = $request->input('order_id');

            $orders = DB::table('orders')
                ->where('orders.id', '=', $order_id)
                ->update(['orders.canceled' => 1]);

            $orders_loc = DB::table('order_locations')
                ->where('order_locations.order_id', '=', $order_id)
                ->update(['order_locations.canceled' => 1]);

            echo "<script>
                        alert('Order canceled!');
                        window.location.href='/legal/order';
                    </script>";
            // return view('dashboard.user.nottification', ['prom' => 'Porudzbina je otkazana!']);
        } catch (Exception $exception) {
            dd($exception->getMessage());
            // return view('dashboard.user.nottification', ['prom' => $exception]);
        }
    }
}
