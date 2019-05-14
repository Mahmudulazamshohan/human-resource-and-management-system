<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeavePay extends Model
{
    protected $table ='leave_pays';
     protected $fillable = [
		'user_id',
		'hourly_salary'
	];
	public function user(){
    	return $this->hasOne('App\User','id','user_id');
    }
     public function employee(){
    	return $this->hasOne('App\Employee','user_id','user_id');
    }
}
