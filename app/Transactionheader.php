<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transactionheader extends Model
{
    //
    public $timestamps = false;

    protected $fillable=[
        'user_id',
        'courier_id',
        'date'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function transactiondetail(){
        return $this->hasMany(Transactiondetail::class);
    }

    public function courier(){
        return $this->hasOne(Courier::class, 'id', 'courier_id');
    }


}
