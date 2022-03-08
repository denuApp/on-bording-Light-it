<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disponibility extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function city()
    {
        return $this->hasMany(City::class, 'id','city_id');
    }

    public function airline()
    {
        return $this->belongsToMany(Airline::class, 'airline_id');
    }
}
