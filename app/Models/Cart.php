<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Article;
use App\Models\User;

class Cart extends Model
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

    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
