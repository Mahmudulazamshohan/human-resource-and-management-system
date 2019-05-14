<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absences extends Model
{
    protected $table ='absences';
    protected $fillable = [
        'user_id',
        'leave_type',
        'reason',
        'date',
        'month',
    ];
    public function user(){
    	return $this->hasOne('App\User','id','user_id');
    }
    public function employee(){
    	return $this->hasOne('App\Employee','user_id','user_id');
    }
}
