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

class ManagerController extends Controller
{
    public $setting = null;
    public $colorSetting = null;

    
    public function __construct()
    {    $this->setting = Setting::find(1);
        $this->middleware('auth.users');
        $this->middleware('manager');
        
        $data = [];
    }

     public function index(){
        $data['title'] ='Manager || Dashboard';
     	return view('manager.dashboard',$data);
     }

   
    
    public  function dashboard(){
        $data['sts']=$this->setting;
        $data['title']= 'Dashboard';
        $data['total_employee'] = Employee::count();
        $data['departments'] =Department::count();
        $data['rewards'] =Rewards::count();
        $data['announcement']  =Announcement::count();
        $data['jan'] = StaffSchedule::where('month','like','%Jan '.date('Y').'%')->count();
        $data['feb'] = StaffSchedule::where('month','like','%Feb '.date('Y').'%')->count(); 
        $data['mar'] = StaffSchedule::where('month','like','%Mar '.date('Y').'%')->count();
        $data['apr'] = StaffSchedule::where('month','like','%Apr '.date('Y').'%')->count();
        $data['may'] = StaffSchedule::where('month','like','%May '.date('Y').'%')->count();
        $data['jun'] = StaffSchedule::where('month','like','%Jun '.date('Y').'%')->count();
        $data['jul'] = StaffSchedule::where('month','like','%Jul '.date('Y').'%')->count();
        $data['an'] =  Announcement::limit(2)->get();
        
          return view('manager.dashboard',$data);
    }
    public function departments(){
        $data['sts']=$this->setting;
        $data['title'] = 'Departments';
        $data['department'] =Department::all();
        return view('manager.departments',$data);
    }
    public function storeDepartments(Request $r){
       $this->validate($r,[
        'department'=>'required|max:250|unique:departments',
        'designation'=>'required|max:250'
       ]);
       Department::create([
        'department'=>$r->department,
        'designation'=>$r->designation
       ]);
        session()->flash('type','success');
        session()->flash('message','Successfully created');
      
       return redirect()->back();
    }
    public function editDepartments($id){
      $data['sts']=$this->setting;
         $data['title'] = 'Edit Department';
       $data['departments'] = Department::find($id); 
        return view('manager.edit-departments',$data);
    }
    public function updateDepartments(Request $r){
       $this->validate($r,[
        'department'=>'required|max:250',
        'designation'=>'required|max:250'
       ]);
       Department::where('id',$r->id)->update(
        ['department'=>$r->department,'designation'=>$r->designation]
       );
        session()->flash('type','success');
        session()->flash('message','Successfully updated');
      
       return redirect()->back();

    }
    public function deleteDepartments($id){
       $del = Department::find($id)->delete();
       if($del){
        session()->flash('type','success');
        session()->flash('message','Successfully deleted');
        return redirect()->back();
       }else{
        session()->flash('type','danger');
        session()->flash('message','Delete failed');
        return redirect()->back();
       }
    }
    public function employeeList(){
      $data['sts']=$this->setting;
        $data['title'] = 'Employee List';
        $data['employee'] = Employee::all();
        return view('manager.employee-list',$data);
    }
    public function addEmployee(){
      $data['sts']=$this->setting;
        $data['title'] = 'Add Employee';
        $data['department'] = Department::all();
        return view('manager.add-employee',$data);
    }
    public function storeEmployee(Request $r){
         $this->validate($r,[
         'username'=>'required|max:250',
         'password'=>'required',
         'email'=>'required|unique:users',
         'user_role'=>'required',
         'designation'=>'required',
         'image_file'=>'mimes:jpg,png,jpeg,gif',
         'employee_id' =>'required|max:250|unique:employees',
         'shift_start'=>'required',
         'shift_end'=>'required',
         'resume'=>'mimes:pdf,doc,docx',
         'offer_letter'=>'mimes:pdf,doc',
         'joining_letter'=>'mimes:pdf,doc',
         'contract_and_agreement'=>'mimes:pdf,doc',
         'id_proof'=>'mimes:pdf,doc',
         ]);
         $fs = $r->file('image_file');
         $rs = $r->file('resume');
         $of = $r->file('offer_letter');
         $jo = $r->file('joining_letter');
         $co = $r->file('contract_and_agreement');
         $idp = $r->file('id_proof');
   
         $destinationPath = null;
         $resumePath = null;
         $offerLetterPath = null;
         $joiningLetterPath = null;
         $contractAndAgreementPath = null;
         $idProofPath =  null;
        
         if($r->hasFile('image_file')){
            $destinationPath = Storage::put('person/profile',$fs);
         }
         if($r->hasFile('resume')){
            $resume = Storage::put('person/resume',$rs);
         }
         if($r->hasFile('offer_letter')){
            $offerLetterPath = Storage::put('person/offer_letter', $of);
         }
         if($r->hasFile('joining_letter')){
            $joiningLetterPath = Storage::put('person/joining_letter', $jo);
         }
         if($r->hasFile('contract_and_agreement')){
            $contractAndAgreementPath = Storage::put('person/contract_and_agreement',$co);
         }
         if($r->hasFile('id_proof')){
            $idProofPath = Storage::put('person/id_proof',$idp);
         }
         $user = User::create([
          'name'=>$r->username,
          'password'=>password_hash($r->password,PASSWORD_DEFAULT),
          'email'=>$r->email
         ]);
         $r = RoleAdmin::create([
        
          'role_id'=>$r->user_role,
           'user_id'=>$user->id,
         ]);
         
          $data = [
          'user_id'=>$user->id,
          'father_name'=>Input::get('father_name'),
          'shift_start'=>Input::get('shift_start'),
          'shift_end'=>Input::get('shift_end'),
          'date_of_birth'=>Input::get('date_of_birth'),
          'gender'=>Input::get('gender'),
          'phone_number'=>Input::get('phone_number'),
          'local_address'=>Input::get('local_address'),
          'permanent_address'=>Input::get('permanent_address'),
          'image_preview_location'=>$destinationPath,
          'employee_id'=>Input::get('employee_id'),
          'department'=>Input::get('department'),
          'designation'=>Input::get('designation'),
          'date_of_joining'=>Input::get('date_of_joining'),
          'joining_salary'=>Input::get('joining_salary'),
          'account_holder_name'=>Input::get('account_holder_name'),
          'account_number'=>Input::get('account_number'),
          'bank_name'=>Input::get('bank_name'),
          'ifsc_code'=>Input::get('ifsc_code'),
          'pan_number'=>Input::get('pan_number'),
          'branch'=>Input::get('branch'),
          'resume_location'=>$resumePath,
          'offer_letter_location'=>$offerLetterPath,
          'joining_letter_location'=>$joiningLetterPath,
          'contract_and_agreement_location'=>$contractAndAgreementPath,
          'id_proof_location'=>$idProofPath
         ];
          $e = Employee::create($data);
          session()->flash('type','success');
          session()->flash('message','Emlployee added successfully');
      
          return redirect()->back();

    }
    public function apiDesignation(Request $r){
           if ($r->isMethod('get')) {
            
              $dp = Department::where('department',$r->department)->first(); 
           
             foreach (explode(',',$dp->designation) as $d) {
                echo '<option value="'.$d.'">'.$d.'</option>';
             }
           }
            
    }
    public function editEmployee($id){
         $data['sts']=$this->setting;
         $data['title'] ="Edit Employee";
         $data['department'] = Department::all();
         $data['employee'] = Employee::find($id);
         $data['id'] = $id;
         return view('manager.edit-employee',$data);
    }
    public function updateEmployee(Request $r){
     
       $this->validate($r,[
         'username'=>'required|max:250',
         'image_file'=>'mimes:jpg,png,jpeg,gif',
         'resume'=>'mimes:pdf,doc,docx',
         'offer_letter'=>'mimes:pdf,doc',
         'joining_letter'=>'mimes:pdf,doc',
         'contract_and_agreement'=>'mimes:pdf,doc',
         'id_proof'=>'mimes:pdf,doc',
         ]);
         $fs = $r->file('image_file');
         $rs = $r->file('resume');
         $of = $r->file('offer_letter');
         $jo = $r->file('joining_letter');
         $co = $r->file('contract_and_agreement');
         $idp = $r->file('id_proof');
   
         $destinationPath = null;
         $resumePath = null;
         $offerLetterPath = null;
         $joiningLetterPath = null;
         $contractAndAgreementPath = null;
         $idProofPath =  null;
          
         if($r->hasFile('image_file')){
            $destinationPath = Storage::put('person/profile',$fs);
            Employee::where('id',$r->user_id)->update(['image_preview_location'=>$destinationPath]);
         }
         if($r->hasFile('resume')){
            $resumePath = Storage::put('person/resume',$rs);
            $e = Employee::where('id',$r->user_id)->update(['resume_location'=>$resumePath]);
           

         }
         if($r->hasFile('offer_letter')){
            $offerLetterPath = Storage::put('person/offer_letter', $of);
            Employee::where('id',$r->user_id)->update(['offer_letter_location'=>$offerLetterPath]);
         }
         if($r->hasFile('joining_letter')){
            $joiningLetterPath = Storage::put('person/joining_letter', $jo);
            Employee::where('id',$r->user_id)->update(['joining_letter_location'=>$joiningLetterPath]);
         }
         if($r->hasFile('contract_and_agreement')){
            $contractAndAgreementPath = Storage::put('person/contract_and_agreement',$co);
            Employee::where('id',$r->user_id)->update(['contract_and_agreement_location'=>$contractAndAgreementPath]);
         }
         if($r->hasFile('id_proof')){
            $idProofPath = Storage::put('person/id_proof',$idp);
            Employee::where('id',$r->user_id)->update(['id_proof_location'=>$idProofPath]);
         }
         if($r->password!=null && $r->email != null && $r->username != null ){
         $user = User::where('id',Input::get('user_id'))->update([
          'name'=>$r->username,
          'password'=>password_hash($r->password,PASSWORD_DEFAULT),
          'email'=>$r->email
         ]);
          }
         
          $data = [
          'father_name'=>Input::get('father_name'),
          'date_of_birth'=>Input::get('date_of_birth'),
          'gender'=>Input::get('gender'),
          'phone_number'=>Input::get('phone_number'),
          'local_address'=>Input::get('local_address'),
          'permanent_address'=>Input::get('permanent_address'),
          'department'=>Input::get('department'),
          'designation'=>Input::get('designation'),
          'date_of_joining'=>Input::get('date_of_joining'),
          'joining_salary'=>Input::get('joining_salary'),
          'account_holder_name'=>Input::get('account_holder_name'),
          'account_number'=>Input::get('account_number'),
          'bank_name'=>Input::get('bank_name'),
          'ifsc_code'=>Input::get('ifsc_code'),
          'pan_number'=>Input::get('pan_number'),
          'branch'=>Input::get('branch')
         ];
          Employee::where('id',Input::get('user_id'))->update($data);
          session()->flash('type','success');
          session()->flash('message','Emlployee added successfully');
      
          return redirect()->back();
    }
    public function addAttendances(){
      $data['sts']=$this->setting;
        $data['title'] ='Attendances';
        $data['department'] =Department::all();
        $data['employee'] = Employee::all();
        $data['attendance'] =DB::table('employees')->join('attendances', 'employees.user_id', '=', 'attendances.user_id')->get();
        
           

        return view('manager.add-attendances',$data);
    }
    public function storeAttendances(Request $r){
       $this->validate($r,[
         'employee_id'=>'required|max:250',
         'attendance_date'=>'required'
       ]);

       if(Attendances::where('user_id',$r->employee_id)->where('attendance_date',$r->attendance_date)->first()!=null){
           session()->flash('type','danger');
           session()->flash('message','Attendances already added');
           }else{
              
               Attendances::create(['user_id'=>$r->employee_id,'attendance_date'=>$r->attendance_date]);
               session()->flash('type','success');
               session()->flash('message','Emlployee added successfully');
           }
           
           return redirect()->back();
        }
    public function leaveType(){
      $data['sts']=$this->setting;
        $data['title'] = 'Leave Type';
        $data['leave']  =LeaveType::all();
        return view('manager.leave-type',$data);
    }

    public function storeLeaveType(Request $r){
        
       $this->validate($r,[
        'leave_type'=>'required'
       ]);
       LeaveType::create([
        'leave_type'=>$r->leave_type
       ]);
       session()->flash('type','success');
       session()->flash('message','Leave Type Successfully added');
       return redirect()->back();
    }
   public function deleteLeaveType($id){
     LeaveType::where('id',$id)->delete();
     session()->flash('type','danger');
     session()->flash('message','Leave Type deleted successfully');
     return redirect()->back();
   }
   public function addAbsences(){
     $data['title'] = 'Add Absences';
     $data['sts']=$this->setting;
     $data['leave']  =LeaveType::all();
     $data['employee'] = Employee::all();
     $data['absences'] = Absences::all();
     return view('manager.add-absences',$data);
   }
   public function storeAbsences(Request $r){
     $this->validate($r,[
        'leave_type'=>'required',
        'reason'=>'max:255',
        'date'=>'required'
     ]);
      if(Absences::where('user_id',$r->user_id)->where('date',$r->date)->first()!=null){
         session()->flash('type','danger');
         session()->flash('message','Absences already added');
      }else{
        Absences::create([
        'user_id'=>$r->user_id,
        'leave_type'=>$r->leave_type,
        'reason'=>$r->reason,
        'date'=>$r->date
     ]);
       session()->flash('type','success');
       session()->flash('message','New Absence added successfully');
      }
     
     
     return redirect()->back();

   }
   public function editAbsences($id){
    $data['sts']=$this->setting;
     $data['title'] = 'Edit Absences';
     $data['leave']  =LeaveType::all();
     $data['employee'] = Employee::all();
     $data['absences'] = Absences::find($id);
     return view('manager.edit-absences',$data);
   }
   public function updateAbsences(Request $r){
    $this->validate($r,[
        'leave_type'=>'required',
        'reason'=>'max:255',
        'date'=>'required'
     ]);
    
        Absences::where('user_id',$r->user_id)->update([
        'user_id'=>$r->user_id,
        'leave_type'=>$r->leave_type,
        'reason'=>$r->reason,
        'date'=>$r->date
     ]);
       session()->flash('type','success');
       session()->flash('message','New Absence added successfully');
     
     
     
     return redirect()->back();
   }
   public function deleteAbsences($id){
     Absences::where('id',$id)->delete();
     session()->flash('type','success');
     session()->flash('message','Absences deleted successfully');
 
     return redirect()->back();
   }
   public function rewards(){
    $data['sts']=$this->setting;
    $data['title'] = 'Rewards';
    $data['reward'] = Rewards::all();
    $data['employee'] =Employee::all();
    return view('manager.rewards',$data);
   }
   public function storeRewards(Request $r){
     $this->validate($r,[
        'user_id'=>'required',
        'award_name'=>'required',
        'gift_item'=>'required',
        'cash_price'=>'required'
     ]);
     Rewards::create([
        'user_id'=>Input::get('user_id'),
        'award_name'=>Input::get('award_name'),
        'gift_item'=>Input::get('gift_item'),
        'cash_price'=>Input::get('cash_price')]);

     session()->flash('type','success');
     session()->flash('message','Rewards successfully added');
 
     return redirect()->back();


   }
   
   public function deleteRewards($id){
      Rewards::where('id',$id)->delete();
      session()->flash('type','success');
      session()->flash('message','Rewards successfully deleted');
 
     return redirect()->back();
   }


   public function calendar(){
     $data['title'] ='Calendar';
     $data['sts']=$this->setting;
     return view('manager.calendar',$data);
   }
   public function storeCalendar(Request $r){
     $this->validate($r,[
        'time'=>'required',
        'date'=>'required',
        'text'=>'required'
     ]);
     if(Calendar::where('date',$r->date)->where('time',$r->time)->first()!=null){
          session()->flash('type','success');
          session()->flash('message','Calendar Successfully Saved');
     }else{
          session()->flash('type','success');
          session()->flash('message','Calendar Successfully Saved');
          Calendar::create(['time'=>$r->time,
                            'date'=>$r->date,
                            'text'=>$r->text
                           ]);
     }
    
     
      return redirect()->back();
   }
 public function apiCalendar(){
     $js = [];
     $c = Calendar::all();
    
     //var_dump($dt->toDayDateTimeString());
     foreach ($c as $cs) {
        //echo 'new Date('.$cs->date.' '.strtoupper($cs->time).')';
         $dt = Carbon::parse($cs->date." ".$cs->time);
         //echo  $dt->toDayDateTimeString();
        $js[] =array(
            'title'=>$cs->text,
            'start'=>$dt->toDayDateTimeString(),
            'allDay'=> false
        );
     }
     echo json_encode($js);
 }
 public function staffScheduling(){
   $data['title'] = 'Staff Scheduling';
   $data['sts']=$this->setting;
   $data['employee'] =Employee::all();
   $data['staff_scheduling'] =StaffSchedule::all();
   return view('manager.staff-scheduling',$data);
 }
 public function storeStaffScheduling(Request $r){
  $this->validate($r,[
    'user_id'=>'required',
    'date'=>'required',
    'time_in'=>'required',
    'time_out'=>'required'
  ]);
  $c  = Carbon::parse($r->date)->format('M Y');
  
  if(StaffSchedule::where('user_id',$r->user_id)->where('date',$r->date)->first()!=null){
        session()->flash('type','danger');
        session()->flash('message','Schedule already added');
  }else{
    if(Employee::where('user_id',$r->user_id)->first()!=null){
        
        $shiftStart = strtotime(Employee::where('user_id',$r->user_id)->first()->shift_start);
        $shiftEnd = strtotime(Employee::where('user_id',$r->user_id)->first()->shift_end);
        $shifTime =abs($shiftEnd-$shiftStart);
        $timeIn = strtotime($r->time_in);
        $timeOut =strtotime($r->time_out);
        $hourWorked = abs($timeOut-$timeIn);
        if(($timeIn - $shiftStart) < 0){
            $tardiness = 0;
        }else{
            $tardiness = $timeIn - $shiftStart;
        }
        $overTime =  $hourWorked - $shifTime;
        // echo "ShifTime ".($shifTime/3600).'<br>';
        // echo "TimeIn ".($timeIn).'<br>';
        // echo "TimeOut ".($timeOut).'<br>';
        // echo "hourWorked ".($hourWorked/3600).'<br>';
        // echo "tardiness ".($tardiness/3600).'<br>';
        // echo "overTime".$overTime/3600;
        if(($overTime/3600) < 0){
            $overTime = 0;
            $insertData = [
           'user_id'=>$r->user_id,
           'date'=>$r->date,
           'month'=>$c,
           'time_in'=>$r->time_in,
           'time_out'=>$r->time_out,
           'hours_worked_int'=>$hourWorked,
           'hours_worked_str'=> sprintf("%2d hours and %2d minutes", floor($hourWorked / 3600), ($hourWorked / 60) % 60),
           'shift_start'=>Employee::where('user_id',$r->user_id)->first()->shift_start,
           'shift_end'=>Employee::where('user_id',$r->user_id)->first()->shift_end,
           'tardiness_str'=>sprintf("%2d hours and %2d minutes", floor($tardiness / 3600), ($tardiness / 60) % 60),
           'tardiness_int'=>$tardiness,
           'overtime_str'=>sprintf("%2d hours1 ", floor($overTime)),
           'overtime_int'=>$overTime,
        ];
           
        }else{
            //$overTime = $overTime/3600;
             $insertData = [
           'user_id'=>$r->user_id,
           'date'=>$r->date,
           'month'=>$c,
           'time_in'=>$r->time_in,
           'time_out'=>$r->time_out,
           'hours_worked_int'=>$hourWorked,
           'hours_worked_str'=> sprintf("%2d hours and %2d minutes", floor($hourWorked / 3600), ($hourWorked / 60) % 60),
           'shift_start'=>Employee::where('user_id',$r->user_id)->first()->shift_start,
           'shift_end'=>Employee::where('user_id',$r->user_id)->first()->shift_end,
           'tardiness_str'=>sprintf("%2d hours and %2d minutes", floor($tardiness / 3600), ($tardiness / 60) % 60),
           'tardiness_int'=>$tardiness,
           'overtime_str'=>sprintf("%2d hours ", floor($overTime/3600)),
           'overtime_int'=>$overTime,

        ];
        }
        StaffSchedule::create($insertData);
        session()->flash('type','success');
        session()->flash('message','Schedule Successfully Saved');
     }else{
        session()->flash('type','danger');
        session()->flash('message','Emlployee ID not Found');
    }
  }
    
    return redirect()->back();


 }
 public function deleteStaffScheduling($id){
  StaffSchedule::where('id',$id)->delete();
  session()->flash('type','success');
  session()->flash('message','Schedule Successfully Deleted');
  return redirect()->back();
 }
public function performanceBonus(){
  $data['title'] ="Performance Bonus";
  $data['employee'] = Employee::all();
  $data['sts']=$this->setting;
  $data['bonus'] = Bonus::all();
  return view('manager.performance-bonus',$data);
}
public function storePerformanceBonus(Request $r){
   $this->validate($r,[
   'user_id'=>'required',
   'note'=>'required|max:255',
   'date'=>'required',
   'number_of_star'=>'required',
   'bonus_amount'=>'required'
   ]);
   Bonus::create(Input::all());
   session()->flash('type','success');
   session()->flash('message','Bonus Successfully Added');
   return redirect()->back();
}
public function editPerformanceBonus($id){
    $data['title'] = "Edit Performance";
  $data['employee'] = Employee::all();
  $data['sts']=$this->setting;
    $data['bonus'] = Bonus::find($id);

    return view('manager.edit-performance-bonus',$data);

}
public function updatePerformanceBonus(Request $r){
   $this->validate($r,[
   'user_id'=>'required',
   'note'=>'required|max:255',
   'date'=>'required',
   'number_of_star'=>'required',
   'bonus_amount'=>'required'
   ]);
   Bonus::where('user_id',$r->user_id)->update(Input::except('_token'));
   session()->flash('type','success');
   session()->flash('message','Bonus Successfully Updated');
   return redirect()->back();
}
public function  performanceBonusDelete($id){
   Bonus::where('id',$id)->delete();
   session()->flash('type','success');
   session()->flash('message','Bonus Successfully Deleted');
   return redirect()->back();
}
public function salaryType(){
  $data['title'] = 'Salary Type';
  $data['sts']=$this->setting;
  $data['salary_type'] =SalaryType::all();
  return view('manager.salary-type',$data);
}
public function storeSalaryType(Request $r){
  $this->validate($r,[
    'hourly_salary'=>'required',
    'weekly_salary'=>'required'
  ]);
  if(count(SalaryType::all())){
   
    session()->flash('type','danger');
    session()->flash('message','Salary Type Already added, You can edit them');
    
  }else
  {
    SalaryType::create(Input::except('_token'));
    session()->flash('type','success');
    session()->flash('message','Salary Type Add Successfully'); 
  }
    return redirect()->back();
  
}
public function editSalaryType($id){
  $data['title'] ="Edit Salary Type";
  $data['sts']=$this->setting;
  $data['st'] = SalaryType::find($id);
  return view('manager.edit-salary-type',$data);
}
public function updateSalaryType(Request $r){
  $this->validate($r,[
    'hourly_salary'=>'required',
    'weekly_salary'=>'required'
  ]);
  SalaryType::where('id',$r->id)->update(Input::except('_token'));
  session()->flash('type','success');
  session()->flash('message','Salary Type Successfully Updated'); 
  return redirect()->back();

}
public function deleteSalaryType($id){
  SalaryType::where('id',$id)->delete();
  session()->flash('type','success');
  session()->flash('message','Salary Type Successfully Deleted');
  return redirect()->back();
}
public function salaryStructure(){
  $data['title']= 'Salary Structure';
  $data['sts']=$this->setting;
  $data['salary'] = DB::select('SELECT employees.employee_id, users.name,staff_schedules.user_id,staff_schedules.month,sum(staff_schedules.hours_worked_int)as hour_worked,sum(staff_schedules.overtime_int) as overtime,sum(staff_schedules.tardiness_int) as tardiness FROM staff_schedules,users,employees WHERE users.id = staff_schedules.user_id and employees.user_id = staff_schedules.user_id  GROUP BY staff_schedules.user_id , staff_schedules.month');
   
 
  return view('manager.salary-structure',$data);

}
public function viewSalaryStructure($id){
  $data['title'] ='View Salary';
  $data['sts']=$this->setting;
  $data['em'] = Employee::where('user_id',$id)->first();
        $shiftStart = strtotime(Employee::where('user_id',$id)->first()->shift_start);
        $shiftEnd = strtotime(Employee::where('user_id',$id)->first()->shift_end);
        $shifTime =abs($shiftEnd-$shiftStart);
       

  $data['shift_time']  = $shifTime/3600;
  $data['salary'] = DB::select('SELECT employees.employee_id, users.name,staff_schedules.user_id,staff_schedules.month,sum(staff_schedules.hours_worked_int)as hour_worked,sum(staff_schedules.overtime_int) as overtime,sum(staff_schedules.tardiness_int) as tardiness FROM staff_schedules,users,employees WHERE users.id = staff_schedules.user_id and employees.user_id = staff_schedules.user_id AND employees.user_id = '.$id.'  GROUP BY staff_schedules.user_id , staff_schedules.month Order By staff_schedules.month DESC');
  
  $data['current_salary']  = DB::select('SELECT SUM(staff_schedules.hours_worked_int) as hours_worked,sum(staff_schedules.overtime_int) as overtime from staff_schedules WHERE staff_schedules.user_id = 27 AND staff_schedules.month = (SELECT staff_schedules.month FROM staff_schedules WHERE staff_schedules.user_id = 27 ORDER BY staff_schedules.month DESC LIMIT 1)')[0];
  $data['lv'] =DB::select('SELECT sum(leaves.total_days) as leaves  from leaves where leaves.applied_on = (SELECT leaves.applied_on  FROM leaves ORDER BY leaves.applied_on DESC LIMIT 1) and leaves.user_id ='.$id)[0];
 //var_dump($data['lv']);
  
   return view('manager.view-salary',$data);
}
public function leaves(){
 $data['title'] ='Leaves';
 $data['leaves'] =  Leaves::all();
 $data['employee'] =Employee::all();
 $data['leave_type'] =LeaveType::all();
 $data['leaves'] =Leaves::all();
 $data['sts']=$this->setting;
 return view('manager.leaves',$data);  
}
public function storeLeaves(Request $r){
   $this->validate($r,[
    'leave_type'=>'required',
    'date_from'=>'required',
    'date_to'=>'required',
    'applied_on'=>'required',
    'reason'=>'required'
   ]);
   $date_from = strtotime($r->date_from);
   $date_to =  strtotime($r->date_to);
   $totalDays  = (abs($date_to - $date_from)/86400);
    //echo $r->date_to.'  '.$r->date_from;
    if(floor($totalDays) > 0){
     Leaves::create([
        'user_id'=>$r->user_id,
        'leave_type'=>$r->leave_type,
        'date_from'=>$r->date_from,
        'date_to'=>$r->date_to,
        'applied_on'=>$r->applied_on,
        'reason'=>$r->reason,
        'comment'=>$r->comment,
        'total_days'=>floor($totalDays),
        'status'=>'false',
       ]);
     session()->flash('type','success');
     session()->flash('message','Employee Leaves Successfully Added'); 
   }else{
     session()->flash('type','danger');
     session()->flash('message','Please enter valid Date To And Date From'); 
   }
     return redirect()->back();
   
}
public function leavesAccept($id){
   Leaves::find($id)->update(['status'=>'true']);
   session()->flash('type','success');
   session()->flash('message','Leave Accepted Successfully'); 
   return redirect()->back();  

}
public function leavesPending($id){
   Leaves::find($id)->update(['status'=>'false']);
   session()->flash('type','success');
   session()->flash('message','Satus Pending now'); 
   return redirect()->back();  

}
public function leavesEdit($id){
 $data['title'] ='Leaves Edit';
 $data['ls'] =  Leaves::find($id);
 $data['employee'] =Employee::all();
 $data['leave_type'] =LeaveType::all();
 $data['sts']=$this->setting;
 return view('manager.edit-leaves',$data);
}
public function leavesUpdate(Request $r){
  $this->validate($r,[
    'leave_type'=>'required',
    'date_from'=>'required',
    'date_to'=>'required',
    'applied_on'=>'required',
    'reason'=>'required'
   ]);
   $date_from = strtotime($r->date_from);
   $date_to =  strtotime($r->date_to);
   $totalDays  = (abs($date_to - $date_from)/86400);
  if(floor($totalDays) > 0){
     Leaves::where('user_id',$r->employee_id)->update([
        'user_id'=>$r->user_id,
        'leave_type'=>$r->leave_type,
        'date_from'=>$r->date_from,
        'date_to'=>$r->date_to,
        'applied_on'=>$r->applied_on,
        'reason'=>$r->reason,
        'comment'=>$r->comment,
        'total_days'=>floor($totalDays)
       ]);
     session()->flash('type','success');
     session()->flash('message','Employee Leaves Successfully Updated'); 
   }else{
     session()->flash('type','danger');
     session()->flash('message','Please enter valid Date To And Date From'); 
   }
   return redirect()->back(); 
}
public function leavesDelete($id){
  Leaves::find($id)->delete();
  session()->flash('type','success');
  session()->flash('message','Leaves Data Successfully Deleted'); 
  return redirect()->back(); 
}
public function setting(){
  $data['title'] = 'General Setting';
  $data['sts'] = Setting::find(1);
  return view('manager.setting',$data);
}

public function updateSetting(Request $r){
 $this->validate($r,[
  'name'=>'required',
  'email'=>'required',
  'logo_file'=>'mimes:jpg,png,jpeg,gif|dimensions:max_width=300,max_height=100',
  'mobile'=>'required'
 ]);
 //File For Logo
 $logo_file = $r->file('logo_file');
 $logoFileName = null;
 if($logo_file){
   $logoFileName = Storage::put('setting',$logo_file);
 }
 if($logoFileName){
    Setting::find(1)->update([
              'website_logo'=>$logoFileName,
              'website_name'=>$r->name,
              'browser_icon'=>null,
              'email'=>$r->email,
              'phone'=>$r->mobile,
            ]);
 }else{
  Setting::find(1)->update([
              'website_name'=>$r->name,
              'browser_icon'=>null,
              'email'=>$r->email,
              'phone'=>$r->mobile,
            ]);

 }

 session()->flash('type','success');
 session()->flash('message','Setting Updated Successfully');
 return redirect()->back();

}
public function announcement(){
  $data['sts']= $this->setting;
  $data['title'] = 'Announcement';
  $data['an'] = Announcement::all();

  return view('manager.announcement',$data);
}
public function editAnnouncement($id){
  $data['sts']= $this->setting;
  $data['title'] = 'Announcement Edit';
  $data['an'] = Announcement::find($id);
  $data['id'] = $id;
  return view('manager.edit-announcement',$data);
}
public function deleteAnnouncement($id){
  Announcement::find($id)->delete();
  session()->flash('type','success');
  session()->flash('message','Announcement Successfully Deleted');
  return redirect()->back();
}
public function updateAnnouncement(Request $r){
 $this->validate($r,[
  'title'=>'required',
  'description'=>'required|max:10000',
  'image_file'=>'mimes:jpg,png,jpeg,gif',
  ]);

  $fl = null;
  $fs = $r->file('image_file');
  if($fs){
    $fl = Storage::put('person/announcement',$fs);
  }

  Announcement::where('id',$r->id)->update([
   'title'=>$r->title,
   'description'=>$r->description,
   'image_file'=>$fl
  ]);
  session()->flash('type','success');
  session()->flash('message','Announcement Successfully Updated');
  return redirect()->back();

}
public function storeAnnouncement(Request $r){
  $this->validate($r,[
  'title'=>'required',
  'description'=>'required|max:10000',
  'image_file'=>'mimes:jpg,png,jpeg,gif',
  ]);
  $fl =null;
  $fs = $r->file('image_file');
  if($fs){$fl = Storage::put('person/announcement',$fs);}
   
  Announcement::create([
   'title'=>$r->title,
   'description'=>$r->description,
   'image_file'=>$fl
  ]);
  session()->flash('type','success');
  session()->flash('message','Announcement Successfully Saved');
  return redirect()->back();

}
public function  travelExpenses(){
  $data['title'] = 'Travel Expenses';
  $data['sts'] = $this->setting;
  $data['em']  =Employee::all();
  $data['trv'] = TravelExpenses::all();
  return view('manager.travel-expenses',$data);
}
public function storeTravelExpenses(Request $r){
  $this->validate($r,[
   'user_id'=>'required',
   'date'=>'required',

  ]);
  TravelExpenses::create(Input::all());
  session()->flash('type','success');
  session()->flash('message','Travel Expense Successfully added');
  return redirect()->back();
}
public function editTravelExpenses($id){
  $data['title'] = 'Edit Travel Expenses';
  $data['sts'] = $this->setting;
  $data['em'] = Employee::all();
  $data['tr'] = TravelExpenses::find($id);
  return view('manager.edit-travel-expenses',$data);
}
public function deleteTravelExpenses($id){
  TravelExpenses::find($id)->delete();
  session()->flash('type','success');
  session()->flash('message','Travel Expense Successfully Deleted');
  return redirect()->back();
}
public function updateTravelExpenses(Request $r){
 $this->validate($r,[
   'user_id'=>'required',
   'date'=>'required',

  ]);
 TravelExpenses::where('user_id',$r->user_id)->update(Input::except('_token','user_id'));
  session()->flash('type','success');
  session()->flash('message','Travel Expense Successfully updated');
  return redirect()->back();

}


public function meetingRecord(){
 $data['title'] = 'Meeting Record';
 $data['mr'] =MeetingRecord::all();
 $data['em'] = Employee::all();
 $data['sts'] = $this->setting;
 return view('manager.meeting-record',$data);
}

public function deleteMeetingRecord($id){
  MeetingRecord::find($id)->delete();
  session()->flash('type','danger');
  session()->flash('message','Meeting Deleted Successfully');
  return redirect()->back();

}
public function storeMeetingRecord(Request $r){
 $this->validate($r,[
 'user_id'=>'required',
 'project_name'=>'required',
 'location'=>'required',
 'date'=>'required',
 'time'=>'required',
 'meeting_content'=>'max:10000',
 ]);
  MeetingRecord::create(Input::except('_token'));
  session()->flash('type','success');
  session()->flash('message','Meeting Successfully Add');
  return redirect()->back();
}

public function violationRecord(){
  $data['title'] = 'Violation Record';
  $data['em'] = Employee::all();
  $data['sts'] = $this->setting;
  $data['vio'] = Violation::all();
  return view('manager.violation',$data);

}
public function deleteViolationRecord($id){
  Violation::find($id)->delete();
  session()->flash('type','success');
  session()->flash('message','Violation Successfully deleted');
  return redirect()->back();
}
public function storeViolationRecord(Request $r){
  $this->validate($r,[
  'user_id'=>'required',
  'date'=>'required',
  'violation_type'=>'required',
  'violation_statement'=>'required',
  'description_details'=>'required'
  ]);
  Violation::create(Input::except('_token'));
  session()->flash('type','success');
  session()->flash('message','Violation Successfully Added');
  return redirect()->back();

}
 public function healthInsurances(){
  $data['title']= 'Health Insurances';
  $data['sts'] =$this->setting;
  $data['em'] =Employee::all();
  $data['hl']  =Health::all();
  return view('manager.health-insurances',$data);
 }
 public function deleteHealthInsurances($id){
    Health::find($id)->delete();
    session()->flash('type','success');
    session()->flash('message','Health Insurances Successfully deleted');
    return redirect()->back();
 }
 public function storeHealthInsurances(Request $r){
  $this->validate($r,[
    'user_id'=>'required',
    'employee_social_number'=>'required',
    'amount'=>'required',
    'date'=>'required'
  ]);
  Health::create(Input::except('_token'));
  session()->flash('type','success');
  session()->flash('message','Health Insurances Successfully Added');
  return redirect()->back();
 }
 
public function incomeTax(){
  $data['title']= 'Income Tax';
  $data['sts'] =$this->setting;
  $data['em'] =Employee::all();
  $data['hl']  =Health::all();
}
public function deleteIncomeTax($id){

}
public function storeIncomeTax(){

}
}
