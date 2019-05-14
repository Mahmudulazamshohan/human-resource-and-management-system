<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StaffSchedule extends Model
{
    
    protected $table = 'staff_schedules';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
					'user_id',
					'date',
                    'month',
					'time_in',
					'time_out',
					'hours_worked_int',
					'hours_worked_str',
					'shift_start',
					'shift_end',
					'tardiness_str',
					'tardiness_int',
					'overtime_str',
					'overtime_int',
                         ];
    public function user(){
    	return $this->hasOne('App\User','id','user_id');
    }
     public function employee(){
    	return $this->hasOne('App\Employee','user_id','user_id');
    }
}
