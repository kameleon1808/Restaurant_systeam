<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Orders extends Component
{
    public function render()
    {
        // return view('livewire.orders');

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

        return view('livewire.orders', compact('orders'));
    }
}
