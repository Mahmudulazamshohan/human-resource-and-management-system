<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Employee;
class Attendances extends Model
{
    protected $table ='attendances';
    protected $fillable = [
        'user_id',
        'attendance_date'
    ];
   public function employee(){
        return $this->belongsTo('User');
    }
}
