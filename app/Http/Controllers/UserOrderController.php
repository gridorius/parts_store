<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserOrderController extends Controller
{
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function spare_part(){
        return $this->belongsTo('App\SparePart');
    }
}
