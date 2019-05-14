<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Employee extends Model
{
    protected $table ='employees';
    protected $fillable=
    ['user_id','shift_start','shift_end','father_name','date_of_birth','gender','phone_number','local_address','permanent_address','image_preview_location','employee_id','department','designation','date_of_joining','joining_salary','account_holder_name','account_number','bank_name','ifsc_code','pan_number','branch','resume_location','offer_letter_location','joining_letter_location','contract_and_agreement_location','id_proof_location'];
    public function user(){
        return $this->hasOne('App\User','id','user_id');
    }
    public function attendance(){
        return $this->hasMany(Employee::class);
    }
    
}
