<?php

namespace App\Http\Controllers;

use Gate;
use Auth;
use App\ResponseToOrder;
use Illuminate\Http\Request;

class ResponseToOrderController extends Controller
{
    public function create(Request $request){
        if(Gate::denies('isShop'))
            return back();

        ResponseToOrder::create([
            'user_order_id' => $request->user_order_id,
            'user_id' =>Auth::id()
        ]);

        return redirect()->route('profile');
    }
}
