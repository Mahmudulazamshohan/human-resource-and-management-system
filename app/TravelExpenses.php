<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TravelExpenses extends Model
{
    protected $table = 'travel_expenses';
    protected $fillable = ['user_id',
							'date',
							'amount',
							'comment'];
 public function user(){
    	return $this->hasOne('App\User','id','user_id');
    }
 public function employee(){
    	return $this->hasOne('App\Employee','user_id','user_id');
    }
}
