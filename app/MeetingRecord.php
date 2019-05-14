<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MeetingRecord extends Model
{
    protected $table = 'meeting_records';
   
    protected $fillable = [
    	'user_id',
		'project_name',
		'location',
		'topics',
		'date',
		'time',
		'meeting_content'
    ];
    public function user(){
    	return $this->hasOne('App\User','id','user_id');
    }
   public function employee(){
    	return $this->hasOne('App\Employee','user_id','user_id');
    }
}
