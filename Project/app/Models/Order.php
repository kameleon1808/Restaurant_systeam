<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Location;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function legal()
    {
        return $this->belongsTo(Legal::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function order_location()
    {
        return $this->hasMany(OrderLocation::class, 'user_id');
    }
}
