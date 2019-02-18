<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SparePartInShop extends Model
{
    public function shop(){
        return $this->belongsTo('App\User');
    }

    public function spare_part(){
        return $this->belongsTo('App\SparePart');
    }
}
