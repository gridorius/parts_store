<?php

namespace App\Http\Controllers;

use Gate;
use Auth;
use App\SparePartInShop;
use Illuminate\Http\Request;

class SparePartInShopController extends Controller
{
    public function showSparePartInShopForm(){
        return view('profile.spare_part_in_shop_form');
    }

    public function create(Request $request){
        if(Gate::denies('isShop'))
            return back();

        $this->validate($request, [
            'spare_part_id' => 'required|exists:spare_parts,id',
            'price' => 'required|integer'
        ]);

        SparePartInShop::create([
            'user_id' => Auth::id(),
            'spare_part_id' => $request->spare_part_id,
            'price' => $request->price
        ]);

        return redirect()->route('profile');
    }

    public function delete(SparePartInShop $sparePartInShop){
        if(Gate::denies('isShop') || Gate::denies('isOwner', $sparePartInShop))
            return back();
            
        $sparePartInShop->delete();

        return redirect()->route('profile');
    }
}
