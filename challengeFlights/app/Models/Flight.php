<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use HasFactory;

    protected $guarded = [];

//    public function scopeOriginCount ($query, $search)
//    {
//        $query
//            ->count()
//            ->where('id_origin', $search);
//    }
//
//    public function scopeDestinationCount ($query, $search)
//    {
//        $query
//            ->count()
//            ->where('id_destination', $search);
//    }

    public function airline ()
    {
        return $this->belongsTo(Airline::class);
    }

    public function origin()
    {
        return $this->belongsTo(City::class, 'origin_id');
    }

    public function destination()
    {
        return $this->belongsTo(City::class, 'destination_id');
    }
}
