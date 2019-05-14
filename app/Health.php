<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Health extends Model
{
    protected $table= 'healths';
    protected $fillable = ['user_id',
							'employee_social_number',
							'amount',
							'date'];
  public function user(){
    	return $this->hasOne('App\User','id','user_id');
    }
   public function employee(){
    	return $this->hasOne('App\Employee','user_id','user_id');
    }
}
