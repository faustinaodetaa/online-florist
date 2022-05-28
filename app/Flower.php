<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flower extends Model
{
    //

    public $timestamps = false;

    protected $fillable=[
        'flowertype_id',
        'name',
        'price',
        'stock',
        'description',
        'image'
    ];

    function flowertype(){
        return $this->hasOne(Flowertype::class, 'id', 'flowertype_id');
    }

    function cart(){
        return $this->hasMany(Cart::class);
    }

    function transactiondetail(){
        return $this->belongsTo(Transactiondetail::class);
    }

}
