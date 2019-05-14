<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IncomeTax extends Model
{
   protected $table= 'income_taxes';
   protected $fillable = ['user_id',
							'percentage',
							'current_salary'];
  public function user(){
    	return $this->hasOne('App\User','id','user_id');
    }
   public function employee(){
    	return $this->hasOne('App\Employee','user_id','user_id');
    }
}
