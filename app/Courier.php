<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Courier extends Model
{
    //
    public $timestamps = false;

    protected $fillable=[
        'name',
        'cost',
    ];

    public function transactionheader(){
        return $this->belongsTo(Transactionheader::class);
    }
}
