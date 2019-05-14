<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leaves extends Model
{
     protected $table ='leaves';
     protected $fillable = [
		'user_id',
		'leave_type',
		'date_from',
		'date_to',
		'applied_on',
		'reason',
		'comment',
		'total_days',
       'status'
	];
	public function user(){
    	return $this->hasOne('App\User','id','user_id');
    }
     public function employee(){
    	return $this->hasOne('App\Employee','user_id','user_id');
    }
}
