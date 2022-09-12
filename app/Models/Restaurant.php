<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Location;

class Restaurant extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
