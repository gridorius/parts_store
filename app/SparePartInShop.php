<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SparePartInShop extends Model
{
    public function shop(){
        return $this->belongsTo('App\User');
    }

    public function sparePart(){
        return $this->belongsTo('App\SparePart');
    }

    protected $fillable = ['user_id', 'spare_part_id', 'price'];
}
