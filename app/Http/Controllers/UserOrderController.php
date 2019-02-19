<?php

namespace App\Http\Controllers;

use Auth;
use App\UserOrder;
use Illuminate\Http\Request;

class UserOrderController extends Controller
{
    public function showUserOrderForm(){
        return view('profile.user_order_form');
    }

    public function create(Request $request){
        $this->validate($request, [
            'spare_part_id' => 'required|exists:spare_parts,id',
            'min_price' => 'required|integer|min:0',
            'max_price' => 'required|integer|min:'.$request->min_price
        ]);

        UserOrder::create([
            'user_id' => Auth::id(),
            'spare_part_id' => $request->spare_part_id,
            'min_price' => $request->min_price,
            'max_price' => $request->max_price
        ]);

        return redirect()->route('profile');
    }

    public function delete(UserOrder $order){
        $order->delete();

        return redirect()->route('profile');
    }
}
