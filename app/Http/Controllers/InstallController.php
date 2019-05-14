<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \PDO;
use App\User;
use App\Employee;
use App\RoleAdmin;
use App\Role;
class InstallController extends Controller
{
    public function __construct(){
        $this->middleware('guest');
        $data = [];
        
    }
    public function stepOne(){
          
          $fileUser =   $filename = \getcwd().'/public/install.txt';
           if(!file_exists($fileUser)){
            $data['installOK'] = true;
           }else{
            $data['installOK'] = false;
           }
        return view('install.step-one',$data);
        
    }
    public function stepOneBack(Request $r){

        $fileLoc = \getcwd().'/.env';
        $fileInstall = \getcwd().'/public/install.txt';
        //
        set_time_limit(0); 
        $con = mysqli_connect($r->database_host,$r->username, $r->password, $r->database_name);
        if(mysqli_connect_errno()){
            session()->flash('message','Fail to connect database...Please enter correct database info');
           
            return redirect()->back();
        }

        if(\file_exists($fileLoc)){
             $c =  file_get_contents($fileLoc);
             $c = \str_replace('APP_DEBUG=true','APP_DEBUG=false',$c);
             $c = \str_replace('APP_URL=http://localhost','APP_URL=http://'.$r->app_url,$c);
             $c = \str_replace('DB_DATABASE=human_resource_management','DB_DATABASE='.$r->database_name,$c);
             $c = \str_replace('DB_HOST=127.0.0.1','DB_HOST='.$r->database_host,$c);
             $c = \str_replace('DB_USERNAME=root', 'DB_USERNAME='.$r->username, $c);
             $c = \str_replace('DB_PASSWORD=', 'DB_PASSWORD='.$r->password, $c);
            
             $c = \str_replace('MAIL_HOST=smtp.mailtrap.io', 'MAIL_HOST='.$r->mail_host, $c);

             $c = \str_replace('MAIL_PORT=2525', 'MAIL_PORT='.$r->mail_port, $c);
             $c = \str_replace('MAIL_USERNAME=null', 'MAIL_USERNAME='.$r->mail_username, $c);
             $c = \str_replace('MAIL_PASSWORD=null', 'MAIL_PASSWORD='.$r->mail_password, $c);
              $file = fopen($fileLoc,"w");
              fwrite($file,$c);
              fclose($file);
              ///Database install
                $filename = \getcwd().'/hrms.sql';
                $handle = fopen($filename, 'r+');
                $contents = fread($handle, filesize($filename));

                $sql = explode(";", $contents);
                foreach ($sql as $query) {
                $result = mysqli_query($con, $query);

                }
                $fileins = fopen($fileInstall, 'w');
                fwrite($fileins, 'OK');
                fclose($fileins);

                fclose($handle);
                session()->flash('message','Successfully Install Database');
                session()->flash('step-two','');
               
                return redirect()->back();

    }
  }
  public function stepTwo(){

    
     $fileUser =   $filename = \getcwd().'/public/installUser.txt';
     if(!file_exists($fileUser)){
      $data['installOK'] = true;
     }else{
      $data['installOK'] = false;
     }
 
    return view('install.step-two',$data);
  }
  public function stepTwoBack(Request $r){

    $user = User::create([
     'name'=>$r->username,
     'email'=>$r->email,
     'password'=>password_hash($r->password,PASSWORD_DEFAULT),
    ]);
    RoleAdmin::create([
     'user_id'=>$user->id,
      'role_id'=>1
    ]);
    Employee::create([
      'user_id'=>$user->id,
     'employee_id'=>$r->employee_id,
     'shift_start'=>$r->shift_start,
     'shift_end'=>$r->shift_end
    ]);
    $fileUser =   $filename = \getcwd().'/public/installUser.txt';
    $fileins = fopen($fileUser, 'w');
    fwrite($fileins, 'OK');
    fclose($fileins);


     session()->flash('message','Successfully Install Database');
     session()->flash('step-two','');
     return redirect()->back();
  }
}
