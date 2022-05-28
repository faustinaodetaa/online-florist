<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transactiondetail extends Model
{
    //
    public $timestamps = false;

    protected $fillable=[
        'transactionheader_id',
        'flower_id',
        'qty'
    ];

    public function flower(){
        return $this->hasOne(Flower::class, 'id', 'flower_id');
    }

    public function transactionheader(){
        return $this->hasOne(Transactionheader::class, 'id', 'transactionheader_id');
    }
}
