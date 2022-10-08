<?php

namespace App\Http\Livewire;

use App\Models\OrderLocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Requests extends Component
{
    public function render(Request $request)
    {
        $user_id = auth()->user()->id;

        $data = OrderLocation::where('boss_id', null)->where('request', 1)->get();
        $param2 = $request->input('loc');

        return response()->view('livewire.requests', compact('data', 'param2'));
    }
}
