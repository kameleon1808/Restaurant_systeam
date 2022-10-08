<?php

namespace App\Http\Controllers\State;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Cart;
use App\Models\Order;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class OrdersController extends Controller
{
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

        return view('dashboard.state.ordered-articles', compact('articles', 'sum'));
    }

    public function amounts()
    {
        $total_sum = Order::where('accepted', 'PRIHVACENA')->where('canceled', 0)->sum('price');
        $time = Carbon::now();

        $total_sum_today = Order::where('accepted', 'PRIHVACENA')->where('canceled', 0)->whereDate('order_date', Carbon::today())->sum('price');
        $total_sum_week = Order::where('accepted', 'PRIHVACENA')->where('canceled', 0)->whereBetween('order_date', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->sum('price');
        $total_sum_month = Order::where('accepted', 'PRIHVACENA')->where('canceled', 0)->whereMonth('order_date', '=', $time)->whereYear('order_date', '=', $time)->sum('price');
        $total_sum_year = Order::where('accepted', 'PRIHVACENA')->where('canceled', 0)->whereYear('order_date', '=', $time)->sum('price');

        return view('dashboard.state.total-amount', compact('total_sum', 'time', 'total_sum_month', 'total_sum_year', 'total_sum_week', 'total_sum_today'));
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

        return view('dashboard.state.month-amount', compact('months', 'collection'));
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

        return view('dashboard.state.year-amount', compact('months'));
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

        return view('dashboard.state.users-amount', compact('users', 'canceled_ord'));
    }
}
