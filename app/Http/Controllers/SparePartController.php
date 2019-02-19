<?php

namespace App\Http\Controllers;

use App\SparePart;
use Illuminate\Http\Request;

class SparePartController extends Controller
{
    public function showSparePartForm(){
        return view('spare_part_form');
    }

    public function create(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'maker' => 'required'
        ]);

        SparePart::create([
            'name' => $request->name,
            'maker' => $request->maker
        ]);

        return redirect()->route('profile');
    }

    public function find($text){
        $found = SparePart::where('name', 'like', "%$text%")->get();
        return response($found);
    }
}
