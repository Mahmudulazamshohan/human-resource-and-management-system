<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Violation extends Model
{
    protected $table = 'violations';
    protected $fillable = ['user_id',
							'date',
							'violation_type',
							'violation_statement',
							'description_details'];
   public function user(){
    	return $this->hasOne('App\User','id','user_id');
    }
   public function employee(){
    	return $this->hasOne('App\Employee','user_id','user_id');
    }
}
