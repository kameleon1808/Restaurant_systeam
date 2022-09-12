<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
use App\Models\Restaurant;
use App\Models\User;
use App\Models\Article;

class Location extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function order()
    {
        return $this->hasMany(Order::class, 'location_id');
    }

    public function restaurant()
    {
        return $this->hasMany(Restaurant::class, 'location_id');
    }

    public function user()
    {
        return $this->hasMany(User::class, 'location_id');
    }

    public function article()
    {
        return $this->hasMany(Article::class, 'location_id');
    }

    public function order_location()
    {
        return $this->hasMany(OrderLocation::class, 'user_id');
    }
}
