<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserOrder extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function sparePart(){
        return $this->belongsTo('App\SparePart');
    }

    public function responses(){
        return $this->hasMany('App\ResponseToOrder');
    }

    protected $fillable = ['user_id', 'spare_part_id', 'min_price', 'max_price'];
}
