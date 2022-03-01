<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function airlines()
    {
        return $this->belongsToMany(Airline::class);
    }

    public function origin()
    {
        return $this->hasMany(Flight::class, 'origin_id', 'id');
    }

    public function destination()
    {
        return $this->hasMany(Flight::class, 'destination_id', 'id');
    }
}
