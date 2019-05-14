<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bonus extends Model
{
     protected $table ='bonuses';
    protected $fillable = ['id',
 'user_id',
 'date',
 'note',
 'number_of_star',
 'bonus_amount',
    ];
    public function user(){
    	return $this->hasOne('App\User','id','user_id');
    }
    public function employee(){
    	return $this->hasOne('App\Employee','user_id','user_id');
    }
}
