<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('install','InstallController@install');
Route::get('install/step-one','InstallController@stepOne')->name('step-one');
Route::post('install/step-one-back','InstallController@stepOneBack')->name('step-one-back');
Route::get('install/step-two','InstallController@stepTwo')->name('step-two');
Route::post('install/step-two-back','InstallController@steptwoBack')->name('step-two-back');
Route::get('/', function () {
	//echo "Font Page";
    return redirect()->route('login');
});
// Route::prefix('admin')->group(function () {
    Auth::routes();
// });

// Route::prefix('admin')->group(function () {
//     Route::get('users', function () {
//         // Matches The "/admin/users" URL
//         echo "Helo";
//     });
// });
//Manager Modules
Route::prefix('manager')->group(function () {
    Route::get('dashboard','ManagerController@dashboard')->name('manager/dashboard');
    Route::get('/employee-list','ManagerController@employeeList')->name('manager/employee-list');
    Route::get('/add-attendances','ManagerController@addAttendances')->name('manager/add-attendances');
    Route::post('/store-attendances','ManagerController@storeAttendances')->name('manager/store-attendances');
    //Absences
    Route::get('/add-absences','ManagerController@addAbsences')->name('manager/add-absences');
    Route::post('/store-absences','ManagerController@storeAbsences')->name('manager/store-absences');
    Route::get('/edit-absences/{id}','ManagerController@editAbsences')->name('manager/edit-absences');
    Route::post('/update-absences','ManagerController@updateAbsences')->name('manager/update-absences');
    Route::get('/delete-absences/{id}','ManagerController@deleteAbsences')->name('manager/delete-absences');
    //Rewards
    Route::get('/rewards','ManagerController@rewards')->name('manager/rewards');
    Route::post('/store-rewards','ManagerController@storeRewards')->name('manager/store-rewards');
    Route::get('/delete-rewards/{id}','ManagerController@deleteRewards')->name('manager/delete-rewards');
    Route::get('/calendar','ManagerController@calendar')->name('manager/calendar');
    Route::get('/api-calendar','ManagerController@apiCalendar')->name('manager/api-calendar');
    Route::post('/store-calendar','ManagerController@storeCalendar')->name('manager/store-calendar');
    //performance bonus
    Route::get('/performance-bonus','ManagerController@performanceBonus')->name('manager/performance-bonus');
    Route::post('/store-performance-bonus','ManagerController@storePerformanceBonus')->name('manager/store-performance-bonus');
    Route::get('/edit-performance-bonus/{id}','ManagerController@editPerformanceBonus')->name('manager/edit-performance-bonus');
    Route::post('/update-performance-bonus','ManagerController@updatePerformanceBonus')->name('manager/update-performance-bonus');


    Route::get('/delete-performance-bonus/{id}','ManagerController@performanceBonusDelete')->name('manager/delete-performance-bonus');
    //Salary Structure
    Route::get('/salary-structure','ManagerController@salaryStructure')->name('manager/salary-structure');
    Route::get('/view-salary-structure/{id}','ManagerController@viewSalaryStructure')->name('manager/view-salary-structure');
    //Leaves
    Route::get('/leaves','ManagerController@leaves')->name('manager/leaves');
    Route::post('/update-leaves','ManagerController@leavesUpdate')->name('manager/update-leaves');
    Route::post('/store-leaves','ManagerController@storeLeaves')->name('manager/store-leaves');
    Route::get('/accept-leaves/{id}','ManagerController@leavesAccept')->name('manager/accept-leaves');
    Route::get('/pending-leaves/{id}','DManagerController@leavesPending')->name('manager/pending-leaves');
    Route::get('/edit-leaves/{id}','ManagerController@leavesEdit')->name('manager/edit-leaves');
    Route::get('/delete-leaves/{id}','ManagerController@leavesDelete')->name('manager/delete-leaves');
    //Announcement
    Route::get('/announcement','ManagerController@announcement')->name('manager/announcement');
    Route::get('/edit-announcement/{id}','ManagerController@editAnnouncement')->name('manager/edit-announcement');
    Route::get('/delete-announcement/{id}','ManagerController@deleteAnnouncement')->name('manager/delete-announcement');
    Route::post('/store-announcement','ManagerController@storeAnnouncement')->name('manager/store-announcement');
    Route::post('/update-announcement','ManagerController@updateAnnouncement')->name('manager/update-announcement');
});

Route::prefix('employee')->group(function () {
	 Route::get('/home', 'HomeController@index')->name('home');
     Route::get('/dashboard', 'HomeController@dashboard')->name('employee/dashboard');
     Route::get('/announcement/{id}', 'HomeController@announcement')->name('employee/announcement');
     Route::get('/profile', 'HomeController@profile')->name('employee/profile');
     Route::post('/update-profile', 'HomeController@updateProfile')->name('employee/update-profile');

     Route::get('/attendance', 'HomeController@attendance')->name('employee/attendance');
     Route::get('/leaves', 'HomeController@leaves')->name('employee/leaves');
     Route::get('/rewards', 'HomeController@rewards')->name('employee/rewards');
});

//Dashboard Start
Route::get('/dashboard','DashboardController@dashboard')->name('dashboard');
//Departments
Route::get('/departments','DashboardController@departments')->name('departments');
Route::post('/departments','DashboardController@storeDepartments')->name('store-departments');
Route::get('/edit-departments/{id}','DashboardController@editDepartments')->name('edit-departments');
Route::post('/update-departments','DashboardController@updateDepartments')->name('update-departments');
Route::get('/delete-departments/{id}','DashboardController@deleteDepartments')->name('delete-departments');
//Employee
Route::get('/employee-list','DashboardController@employeeList')->name('employee-list');
Route::get('/add-employee','DashboardController@addEmployee')->name('add-employee');
Route::post('/store-employee','DashboardController@storeEmployee')->name('store-employee');
Route::get('/edit-employee/{id}','DashboardController@editEmployee')->name('edit-employee');
Route::post('/update-employee','DashboardController@updateEmployee')->name('update-employee');
//Api Designation
Route::get('/api-designation','DashboardController@apiDesignation')->name('api-designation');
//Atendances
Route::get('/add-attendances','DashboardController@addAttendances')->name('add-attendances');
Route::post('/store-attendances','DashboardController@storeAttendances')->name('store-attendances');
//Leave Type
Route::get('/leave-type','DashboardController@leaveType')->name('leave-type');
Route::get('/delete-leave-type/{id}','DashboardController@deleteLeaveType')->name('delete-leave-type');
Route::post('/store-leave-type','DashboardController@storeLeaveType')->name('store-leave-type');
//Absences
Route::get('/add-absences','DashboardController@addAbsences')->name('add-absences');
Route::post('/store-absences','DashboardController@storeAbsences')->name('store-absences');
Route::get('/edit-absences/{id}','DashboardController@editAbsences')->name('edit-absences');
Route::post('/update-absences','DashboardController@updateAbsences')->name('update-absences');
Route::get('/delete-absences/{id}','DashboardController@deleteAbsences')->name('delete-absences');
//Rewards
Route::get('/rewards','DashboardController@rewards')->name('rewards');
Route::post('/store-rewards','DashboardController@storeRewards')->name('store-rewards');
Route::get('/delete-rewards/{id}','DashboardController@deleteRewards')->name('delete-rewards');
Route::get('/calendar','DashboardController@calendar')->name('calendar');
Route::get('/api-calendar','DashboardController@apiCalendar')->name('api-calendar');
Route::post('/store-calendar','DashboardController@storeCalendar')->name('store-calendar');
//Staff Scheduling
Route::get('/staff-scheduling','DashboardController@staffScheduling')->name('staff-scheduling');
Route::post('/store-staff-scheduling','DashboardController@storeStaffScheduling')->name('store-staff-scheduling');
Route::get('/delete-staff-scheduling/{id}','DashboardController@deleteStaffScheduling')->name('delete-staff-scheduling');
//performance bonus
Route::get('/performance-bonus','DashboardController@performanceBonus')->name('performance-bonus');
Route::post('/store-performance-bonus','DashboardController@storePerformanceBonus')->name('store-performance-bonus');
Route::get('/edit-performance-bonus/{id}','DashboardController@editPerformanceBonus')->name('edit-performance-bonus');
Route::post('/update-performance-bonus','DashboardController@updatePerformanceBonus')->name('update-performance-bonus');

Route::get('/delete-performance-bonus/{id}','DashboardController@performanceBonusDelete')->name('delete-performance-bonus');
//Salary type
Route::get('/salary-type','DashboardController@salaryType')->name('salary-type');
Route::post('/store-salary-type','DashboardController@storeSalaryType')->name('store-salary-type');
Route::get('/edit-salary-type/{id}','DashboardController@editSalaryType')->name('edit-salary-type');
Route::get('/delete-salary-type/{id}','DashboardController@deleteSalaryType')->name('delete-salary-type');
Route::post('/update-salary-type','DashboardController@updateSalaryType')->name('update-salary-type');
//Salary Structure
Route::get('/salary-structure','DashboardController@salaryStructure')->name('salary-structure');
Route::get('/view-salary-structure/{id}','DashboardController@viewSalaryStructure')->name('view-salary-structure');
//Leaves
Route::get('/leaves','DashboardController@leaves')->name('leaves');
Route::post('/update-leaves','DashboardController@leavesUpdate')->name('update-leaves');
Route::post('/store-leaves','DashboardController@storeLeaves')->name('store-leaves');
Route::get('/accept-leaves/{id}','DashboardController@leavesAccept')->name('accept-leaves');
Route::get('/pending-leaves/{id}','DashboardController@leavesPending')->name('pending-leaves');
Route::get('/edit-leaves/{id}','DashboardController@leavesEdit')->name('edit-leaves');
Route::get('/delete-leaves/{id}','DashboardController@leavesDelete')->name('delete-leaves');
//Setting
Route::get('/setting','DashboardController@setting')->name('setting');
Route::post('/update-setting','DashboardController@updateSetting')->name('update-setting');
//Announcement
Route::get('/announcement','DashboardController@announcement')->name('announcement');
Route::get('/edit-announcement/{id}','DashboardController@editAnnouncement')->name('edit-announcement');
Route::get('/delete-announcement/{id}','DashboardController@deleteAnnouncement')->name('delete-announcement');
Route::post('/store-announcement','DashboardController@storeAnnouncement')->name('store-announcement');
Route::post('/update-announcement','DashboardController@updateAnnouncement')->name('update-announcement');
//Travel Expenses
Route::get('/travel-expenses','DashboardController@travelExpenses')->name('travel-expenses');
Route::get('/edit-travel-expenses/{id}','DashboardController@editTravelExpenses')->name('edit-travel-expenses');
Route::post('/update-travel-expenses','DashboardController@updateTravelExpenses')->name('update-travel-expenses');
Route::get('/delete-travel-expenses/{id}','DashboardController@deleteTravelExpenses')->name('delete-travel-expenses');
Route::post('store-travel-expenses','DashboardController@storeTravelExpenses')->name('store-travel-expenses');
//Meeting Record
Route::get('/meeting-record','DashboardController@meetingRecord')->name('meeting-record');
Route::get('/delete-meeting-record/{id}','DashboardController@deleteMeetingRecord')->name('delete-meeting-record');
Route::post('/store-meeting-record','DashboardController@storeMeetingRecord')->name('store-meeting-record');
//Violation Record
Route::get('/violation-record','DashboardController@violationRecord')->name('violation-record');
Route::get('/delete-violation-record/{id}','DashboardController@deleteViolationRecord')->name('delete-violation-record');
Route::post('/store-violation-record','DashboardController@storeViolationRecord')->name('store-violation-record');
//Health Insurances
Route::get('/health-insurances','DashboardController@healthInsurances')->name('health-insurances');
Route::get('/delete-health-insurances/{id}','DashboardController@deleteHealthInsurances')->name('delete-health-insurances');
Route::post('/store-health-insurances','DashboardController@storeHealthInsurances')->name('store-health-insurances');
//Tax 
Route::get('/income-tax','DashboardController@incomeTax')->name('income-tax');
Route::get('/delete-income-tax/{id}','DashboardController@deleteIncomeTax')->name('delete-income-tax');
Route::get('/edit-income-tax/{id}','DashboardController@editIncomeTax')->name('edit-income-tax');
Route::post('/store-income-tax','DashboardController@storeIncomeTax')->name('store-income-tax');
Route::post('/update-income-tax','DashboardController@updateIncomeTax')->name('update-income-tax');
//Profile
Route::get('/profile','DashboardController@profile')->name('profile');
Route::post('/update-profile','DashboardController@updateProfile')->name('update-profile');
//Leave Pay
Route::get('/leave-pay','DashboardController@leavePay')->name('leave-pay');
Route::post('/store-leave-pay','DashboardController@storeLeavePay')->name('store-leave-pay');
Route::get('/edit-leave-pay/{id}','DashboardController@editLeavePay')->name('edit-leave-pay');
Route::get('/delete-leave-pay','DashboardController@deleteLeavePay')->name('delete-leave-pay');
Route::post('/update-leave-pay','DashboardController@updateLeavePay')->name('update-leave-pay');
// OverTime
Route::get('/overtime-pay','DashboardController@overtimePay')->name('overtime-pay');
Route::post('/store-overtime-pay','DashboardController@storeOvertimePay')->name('store-overtime-pay');
Route::get('overtime-edit/{id}','DashboardController@overtimeEdit')->name('overtime-edit');
Route::post('overtime-update','DashboardController@updateOvertimePay')->name('overtime-update');