<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rewards extends Model
{
    protected $table = 'rewards';
   
    protected $fillable = [
    	'user_id',
        'award_name',
		'gift_item',
		'cash_price'
    ];
    public function user(){
    	return $this->hasOne('App\User','id','user_id');
    }
     public function employee(){
    	return $this->hasOne('App\Employee','user_id','user_id');
    }
}
