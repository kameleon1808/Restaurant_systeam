<?php

namespace App\Http\Controllers\RestBoss;

use App\Http\Controllers\Controller;
use App\Http\Livewire\Orders;
use App\Models\Article;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderLocation;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RestBossController extends Controller
{
    public function index()
    {
        $this->allStaff();
        return view('dashboard.rest-boss.home');
    }

    public function allStaff()
    {
        $deliverers = User::where('role', 1)->where('location_id', 1)->get(); //dostavljaci
        $waiters = User::where('role', 3)->where('location_id', 1)->get(); //konobari
        $states = User::where('role', 4)->where('location_id', 1)->get(); //stanje
        $rest_boss = User::where('role', 6)->where('location_id', 1)->get(); //sefovi restorana

        return view('dashboard.rest-boss.home', compact('deliverers', 'waiters', 'states', 'rest_boss',));
    }

    public function addWaiter(Request $request)
    {
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'phone' => $request->input('phone'),
            'role' => 3,
            'location_id' => 1,
            'username' => $request->input('username'),
            'password' => Hash::make($request->input('password')),
        ]);

        return redirect()->back();
    }

    public function addDeliverer(Request $request)
    {
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'phone' => $request->input('phone'),
            'role' => 1,
            'location_id' => 1,
            'username' => $request->input('username'),
            'password' => Hash::make($request->input('password')),
        ]);

        return redirect()->back();
    }

    public function addState(Request $request)
    {
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'phone' => $request->input('phone'),
            'role' => 4,
            'location_id' => 1,
            'username' => $request->input('username'),
            'password' => Hash::make($request->input('password')),
        ]);

        return redirect()->back();
    }

    public function deleteStaff(Request $request)
    {
        $id = $request->input('id');
        // dd($id);
        DB::table('users')->where('id', $id)->delete();

        return redirect()->back();
    }

    //----------deliverer functions---------------------------------------------------------
    public function showOrder(Request $request)
    {
        $data = OrderLocation::where('location_id', 1)->get();

        return view('dashboard.rest-boss.deliverer', compact('data'));
    }

    public function popularArticles()
    {
        $articles = Article::select()
            ->withCount('cart')
            ->orderBy('cart_count', 'desc')
            ->get()
            ->take(5)
            ->groupBy('name');

        // $sum = Cart::where('confirmed', '1')->sum('price');
        $sum = Cart::sum('price');

        return view('dashboard.rest-boss.state.ordered-articles', compact('articles', 'sum'));
    }

    public function amounts()
    {
        $total_sum = Order::where('accepted', 'PRIHVACENA')->where('canceled', 0)->sum('price');
        $time = Carbon::now();

        $total_sum_today = Order::where('accepted', 'PRIHVACENA')->where('canceled', 0)->whereDate('order_date', Carbon::today())->sum('price');
        $total_sum_week = Order::where('accepted', 'PRIHVACENA')->where('canceled', 0)->whereBetween('order_date', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->sum('price');
        $total_sum_month = Order::where('accepted', 'PRIHVACENA')->where('canceled', 0)->whereMonth('order_date', '=', $time)->whereYear('order_date', '=', $time)->sum('price');
        $total_sum_year = Order::where('accepted', 'PRIHVACENA')->where('canceled', 0)->whereYear('order_date', '=', $time)->sum('price');

        return view('dashboard.rest-boss.state.total-amount', compact('total_sum', 'time', 'total_sum_month', 'total_sum_year', 'total_sum_week', 'total_sum_today'));
    }

    public function months()
    {
        $time = Carbon::now();

        $months = [
            "Januar",
            "Februar",
            "Mart",
            "April",
            "Maj",
            "Jun",
            "Jul",
            "Avgust",
            "Septembar",
            "Oktobar",
            "Novembar",
            "Decembar"
        ];

        for ($i = 1; $i < 13; $i++) {
            $total_sum_month = Order::where('accepted', 'PRIHVACENA')->where('canceled', 0)->whereYear('order_date', '=', $time)->whereMonth('order_date', '=', $i)->sum('price');
            $collection[] = $total_sum_month;
        }

        return view('dashboard.rest-boss.state.month-amount', compact('months', 'collection'));
    }

    public function years()
    {
        $months = Order::select(
            "id",
            DB::raw("(sum(price)) as total_price"),
            DB::raw("(DATE_FORMAT(order_date, '%Y')) as year")
        )
            ->where('accepted', 'PRIHVACENA')
            ->where('canceled', 0)
            ->orderBy('order_date')
            ->groupBy(DB::raw("DATE_FORMAT(order_date, '%Y')"))
            ->get();

        // dd($years);

        return view('dashboard.rest-boss.state.year-amount', compact('months'));
    }

    public function users()
    {
        $users = DB::table('users')
            ->select()
            ->selectRaw("SUM(price) as total_amount")
            ->join('orders', 'orders.user_id', 'users.id')
            ->where('accepted', 'PRIHVACENA')
            ->where('canceled', 0)
            ->groupBy('orders.name')
            ->get();

        $canceled_ord = DB::table('users')
            ->select()
            ->selectRaw("SUM(canceled) as canceled_orders")
            ->join('orders', 'orders.user_id', 'users.id')
            ->where('canceled', 1)
            ->groupBy('orders.name')
            ->get();
        // dd($canceled_order);    

        return view('dashboard.rest-boss.state.users-amount', compact('users', 'canceled_ord'));
    }
    //----------waiter functions-----------------------------------------------------------
    public function showOrders()
    {
        $orders = Order::where('location_id', 1)->get();

        return view('dashboard.rest-boss.waiter', compact('orders'));
    }
    //----------state functions-------------------------------------------------------------

    public function statePage()
    {
        return view('dashboard.rest-boss.state.state');
    }

    //--------------------------------------------------------------------------------------

    function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
