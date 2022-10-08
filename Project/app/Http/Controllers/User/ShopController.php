<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Exception;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        try {
            $art = Article::OrderBy("category")->get();

            return view('dashboard.user.shop')->with('art', $art);
        } catch (Exception $exception) {
            // dd($exception->getMessage());
            return view('dashboard.user.nottification', ['prom' => $exception]);
        }
    }

    public function show($slug)
    {
        try {
            $a = Article::where('slug', $slug)->firstOrFail();

            return view('dashboard.user.article')->with('a', $a);
        } catch (Exception $exception) {
            dd($exception->getMessage());
            // return view('dashboard.user.nottification', ['prom' => $exception]);
        }
    }
}
