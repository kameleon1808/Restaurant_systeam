<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cart;
use App\Models\Location;

class Article extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function cart()
    {
        return $this->hasMany(Cart::class, 'article_id');
    }
    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
