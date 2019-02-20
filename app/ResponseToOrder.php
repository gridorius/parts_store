<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResponseToOrder extends Model
{
    public function userOrder(){
        return $this->belongsTo('App\UserOrder');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    protected $fillable = ['user_id', 'user_order_id'];
}
