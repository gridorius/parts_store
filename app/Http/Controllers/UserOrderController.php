<?php

namespace App\Http\Controllers;

use Gate;
use Auth;
use App\UserOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

        $order = UserOrder::create([
            'user_id' => Auth::id(),
            'spare_part_id' => $request->spare_part_id,
            'min_price' => $request->min_price,
            'max_price' => $request->max_price
        ]);

        $mails = UserOrder::select('users.email')
        ->distinct()
        ->join('spare_part_in_shops as t2', 'user_orders.spare_part_id', 't2.spare_part_id')
        ->join('users', 'users.id', 't2.user_id')
        ->whereRaw('t2.price >= user_orders.min_price')
        ->whereRaw('t2.price <= user_orders.max_price')
        ->get();

        foreach($mails as $email)
            Mail::send('emails.message', ['order' => $order], function ($message) use ($email){
                $message->from('user@example.com', 'Laravel');
                $message->to($email->email);
            });

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
