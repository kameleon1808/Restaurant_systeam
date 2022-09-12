<?php

namespace App\Http\Livewire;

use App\Models\OrderLocation;
// use Illuminate\Support\Facades\Request;
use Illuminate\Http\Request;
use Livewire\Component;

class Delivery extends Component
{
    public function render(Request $request)
    {
        $user_id = auth()->user()->id;
        $data = OrderLocation::where('boss_id', null)
            ->orderBy('created_at', 'asc')
            ->orWhere('boss_id', $user_id)
            ->get();
        $param2 = $request->input('loc');
        // dd($data);

        // return view('dashboard.boss.home', compact('data', 'param2'));
        return view('livewire.delivery', compact('data', 'param2'));
    }
}
