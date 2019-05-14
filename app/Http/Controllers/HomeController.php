<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use App\Department;
use Session;
use App\User;
use App\RoleAdmin;
use App\Employee;
use App\Attendances;
use App\LeaveType;
use App\Absences;
use App\Rewards;
use App\Calendar;
use Carbon\Carbon;
use App\StaffSchedule;
use App\Bonus;
use App\SalaryType;
use App\Leaves;
use App\Setting;
use App\Announcement;
use App\TravelExpenses;
use App\MeetingRecord;
use App\Violation;
use App\Health;
use Auth;
class HomeController extends Controller
{  
    public $setting = null;
    public $colorSetting =  null;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth.users');
        $data = [];
        $this->setting =  Setting::find(1);

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    public function dashboard(){
        $data['sts'] =  $this->setting ;
        $data['title'] ='Employee Dashboard';
        $data['an']  = Announcement::all();
        $data['leaves'] = Leaves::where('user_id',Auth::user()->id)->sum('total_days');
        $data['awards'] = Rewards::where('user_id',Auth::user()->id)->count();
        $data['employee'] = Employee::where('user_id',Auth::user()->id)->first();
        
        //echo '<pre>'; print_r($data['employee']); echo '</pre>';

        return view('employee.dashboard',$data);
    }
    public function announcement($id){
        $data['sts'] =  $this->setting ;
        $data['title'] ='Announcement';
        $data['an'] = Announcement::find($id);
        return view('employee.announcement',$data);
    }
    public function profile(){
        $data['sts'] =  $this->setting ;
        $data['title'] ='Profile';
        $data['em'] = Employee::where('user_id',Auth::user()->id)->first();

        return view('employee.profile',$data);
    }
    public function updateProfile(Request $r){
       $this->validate($r,[
        'name'=>'required',
        'password'=>'required'
        
       ]);
      
       User::where('id',Auth::user()->id)->update([
        'name'=>$r->name,
        'password'=>password_hash($r->password,PASSWORD_DEFAULT)
       ]);
        session()->flash('type','success');
        session()->flash('message','Your Successfully Email Or Password Updated Successfully');
        return redirect()->back();
    }
    public function attendance(){
        $data['sts'] =  $this->setting ;
        $data['title'] ='Attendance';
        $data['em'] =  Attendances::where('user_id',Auth::user()->id)->get();
        return view('employee.attendance',$data);
    }
    public function leaves(){
        $data['sts'] =  $this->setting ;
        $data['title'] ='Leave';
        $data['le'] =  Leaves::where('user_id',Auth::user()->id)->get();
        return view('employee.leaves',$data); 
    }
    public function rewards(){
        $data['sts'] =  $this->setting ;
        $data['title'] ='Rewards';
        $data['rd'] =  Rewards::where('user_id',Auth::user()->id)->get();
        return view('employee.rewards',$data); 
    }
}
