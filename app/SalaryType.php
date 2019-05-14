<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalaryType extends Model
{
    protected $table = 'salary_types';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'hourly_salary',
        'weekly_salary'
    ];

    public function user(){
        return $this->hasOne('App\User','id','user_id');
    }
  public function employee(){
        return $this->hasOne('App\Employee','user_id','user_id');
    }
}
