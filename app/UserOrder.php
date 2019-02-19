<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserOrder extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function spare_part(){
        return $this->belongsTo('App\SparePart');
    }

    protected $fillable = ['user_id', 'spare_part_id', 'min_price', 'max_price'];
}
