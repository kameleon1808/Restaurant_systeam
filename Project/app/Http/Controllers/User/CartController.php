<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Cart;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function totalPrice()
    {
        try {
            $user = Auth::user();
            $sum_prices = 0;
            $sum_prices = Cart::where('user_id', $user->id)
                ->where('confirmed', 0)
                ->sum('price');
            return $sum_prices;
        } catch (Exception $exception) {
            dd($exception->getMessage());
            // return view('dashboard.user.nottification', ['prom' => $exception]);
        }
    }

    public function show(Request $request)
    {
        try {
            $user = Auth::user();
            $article = Article::all();

            $data = DB::table('articles')
                ->join('carts', 'carts.article_id', '=', 'articles.id')
                ->where('user_id', $user->id)
                ->where('confirmed', 0)
                ->get();

            $sum_art = Cart::where('user_id', $user->id)->where('confirmed', 0)->sum('prod_qty');
            $sum_prices = $this->totalPrice();

            return view('dashboard.user.cart', compact('user', 'data', 'sum_art', 'sum_prices'));
        } catch (Exception $exception) {
            dd($exception->getMessage());
            // return view('dashboard.user.nottification', ['prom' => $exception]);
        }
    }


    public function store(Request $request)
    {
        try {
            $prod_id = $request->input('article_id');
            $prod_qty = $request->input('prod_qty');
            $price = $request->input('price');
            $price = $price * $prod_qty;

            $cartItem = new Cart();
            $cartItem->article_id = $prod_id;
            $cartItem->user_id = Auth::id();
            $cartItem->prod_qty = $prod_qty;
            $cartItem->price = $price;
            $cartItem->confirmed = 0;
            // dd($cartItem);
            $cartItem->save();

            // return view('dashboard.user.nottification', ['prom' => 'Dodali ste artikal u korpu!']);
            echo "<script>
                        alert('Article added to cart!');
                        window.location.href='/user/shop';
                    </script>";
        } catch (Exception $exception) {
            // dd($exception->getMessage());
            return view('dashboard.user.nottification', ['prom' => $exception]);
        }
    }

    public function remove(Request $request)
    {
        try {
            $id = $request->input('id');

            $query = Cart::where('id', $id)
                ->delete();


            // return view('dashboard.user.nottification', ['prom' => 'Artikal je izbrisan iz korpe!']);
            echo "<script>
                        alert('Article removed!');
                        window.location.href='/user/cart';
                    </script>";
        } catch (Exception $exception) {
            dd($exception->getMessage());
            // return view('dashboard.user.nottification', ['prom' => $exception]);
        }
    }

    public function edit($id)
    {
        try {
            $data = Cart::find($id);
            return view('dashboard.user.edit', compact('data'));
        } catch (Exception $exception) {
            // dd($exception->getMessage());
            return view('dashboard.user.nottification', ['prom' => $exception]);
        }
    }

    public function update(Request $request)
    {
        try {
            $article_id = $request->input('article_id');                                        //id artikla
            $article_price = DB::table('articles')->where('id', $article_id)->first('price');   //jedinicna cena
            $new_qty = $request->input('new_qty');

            if ($new_qty == 0) {
                echo "<script>
                        alert('Quantity can`t be 0!');
                        window.location.href='/user/cart';
                    </script>";
            } else {
                $price = $request->input('new_qty') * $article_price->price;
                // dd($request->input('id'));
                DB::table('carts')->where('id', $request->input('id'))->update(['prod_qty' => $new_qty, 'price' => $price]);


                echo "<script>
                            alert('Quantity changed!');
                            window.location.href='/user/cart';
                        </script>";
            }
        } catch (Exception $exception) {
            dd($exception->getMessage());
            // return view('dashboard.user.nottification', ['prom' => $exception]);
        }
    }
}
