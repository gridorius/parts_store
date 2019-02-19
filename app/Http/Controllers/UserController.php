<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile(){
        return response(DB::table('user_orders')->select('user_orders.id', 'spare_part_in_shops.spare_part_id', 'user_orders.min_price', 'user_orders.max_price', 'spare_part_in_shops.price')
        ->join('spare_part_in_shops', 'user_orders.spare_part_id', 'spare_part_in_shops.spare_part_id')
        ->where('spare_part_in_shops.price', '>=', 'user_orders.min_price')
        ->where('spare_part_in_shops.price', '>=', 'user_orders.max_price')
        ->get());

        return view('profile.index');
    }
}
