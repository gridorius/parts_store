<?php

namespace App\Http\Controllers;

use Gate;
use Auth;
use App\UserOrder;
use Illuminate\Http\Request;

class UserOrderController extends Controller
{
    public function showUserOrderForm(){
        if(Gate::allows('isShop'))
            return back();

        return view('profile.user_order_form');
    }

    public function create(Request $request){
        if(Gate::allows('isShop'))
            return back();
        
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

    public function get(UserOrder $order){
        if(Gate::denies('isOwner', $order))
            return back();

        return view('profile.user_order', ['order' => $order]);
    }

    public function delete(UserOrder $order){
        if(Gate::denies('isOwner', $order))
            return back();

        $order->delete();

        return redirect()->route('profile');
    }
}
