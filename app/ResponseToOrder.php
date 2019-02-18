<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResponseToOrder extends Model
{
    public function user_order(){
        return $this->belongsTo('App\UserOrder');
    }

    public function shop(){
        return $this->belongsTo('App\User');
    }
}
