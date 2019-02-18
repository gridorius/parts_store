<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResponseToOrderController extends Controller
{
    public function user_order(){
        return $this->belongsTo('App\UserOrder');
    }

    public function shop(){
        return $this->belongsTo('App\User');
    }
}
