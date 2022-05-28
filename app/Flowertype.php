<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flowertype extends Model
{
    //
    public $timestamps = false;

    protected $fillable=[
        'name'
    ];

    function flower(){
        return $this->belongsTo(Flower::class);
    }
}
