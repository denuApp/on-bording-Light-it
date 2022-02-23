<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $guarded = [];

    //protected $with = ['flight'];

    public function origin ($query)
    {
        //
    }



    public function flights ()
    {
        return $this->hasMany();
    }
}
