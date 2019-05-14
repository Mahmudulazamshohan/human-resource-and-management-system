<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Overtime extends Model
{
    protected $table = 'overtimes';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'hourly_salary',
    ];

    public function user(){
        return $this->hasOne('App\User','id','user_id');
    }
  public function employee(){
        return $this->hasOne('App\Employee','user_id','user_id');
    }
}
