<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\GoogledriveController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\HelperController;
use App\Http\Controllers\WidgetController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\AttendenceController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Storage;

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;





Route::get('/',[DashboardController::class,'landing_page'])->name('landing_page');
Route::get('/login',[LoginController::class,'login'])->name('login');
Route::post('/authenticate-login',[LoginController::class,'authenticate'])->name('authenticate');
Route::post('/logout',[LoginController::class,'logout'])->name('logout');
Route::get('/employee-directory',[DashboardController::class,'landing_page'])->name('employee_directory');
Route::get('/employee-directory/search_data',[DashboardController::class,'search_data'])->name('directory_search_data');



Route::group(['middleware'=>'auth'],function(){

	Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
	Route::post('/employee/store',[EmployeeController::class,'store'])->name('storeEmployee');
	Route::get('/employee/store',[EmployeeController::class, 'email'])->name('mail');
	Route::get('/employee/profile',[EmployeeController::class, 'employeeDetails'])->name('employeeDetails');
	Route::get('/change-password',[EmployeeController::class, 'viewPassword'])->name('changePassword');
	Route::post('/change-password',[EmployeeController::class, 'changePassword'])->name('changePassword');
	Route::get('/helper',[HelperController::class,'index'])->name('helper');
	Route::get('/widget',[WidgetController::class,'index'])->name('widget');	
	Route::get('/table',[TableController::class,'index'])->name('table');
	Route::get('/media',[MediaController::class,'index'])->name('media');
	Route::get('/chart',[ChartController::class,'index'])->name('chart');
  
	// Route::get('/employees',[EmployeeController::class,'listing'])->name('employeesListing');
    // Route::get('/employee/add',[EmployeeController::class,'add'])->name('addEmployee');
	// Route::get('/employee/edit/{id}',[EmployeeController::class, 'edit'])->name('editEmployee');
	// Route::post('/employee/update/{id}',[EmployeeController::class, 'updateEmployee'])->name('updateEmployee');
	// Route::get('/employee/delete/{id}',[EmployeeController::class, 'delete'])->name('deleteEmployee');
	// Route::post('/employee/ajax',[EmployeeController::class,'ajaxCall'])->name('ajaxCall');
  
	   Route::middleware(['can:isHrOrAdmin'])->group(function () {
		  
		Route::get('/employees',[EmployeeController::class,'listing'])->name('employeesListing');
		Route::get('/employee/add',[EmployeeController::class,'add'])->name('addEmployee');
	    Route::get('/employee/edit/{id}',[EmployeeController::class, 'edit'])->name('editEmployee');
	    Route::post('/employee/update/{id}',[EmployeeController::class, 'updateEmployee'])->name('updateEmployee');
		Route::get('/employee/delete/{id}',[EmployeeController::class, 'delete'])->name('deleteEmployee');
		Route::post('/employee/ajax',[EmployeeController::class,'ajaxCall'])->name('ajaxCall');
		Route::post('/employee/designationAjax',[EmployeeController::class,'designationAjax'])->name('designationAjax');

	
		Route::post('/employee/changestatusajax',[EmployeeController::class,'changestatusajax'])->name('changestatusajax');

		Route::post('/employee/enableajax',[EmployeeController::class,'enableajax'])->name('enableajax');

// 		Route::post('/employee/attendenceAjax',[AttendenceController::class,'attendenceAjax'])->name('attendenceAjax');
// =======
// 		Route::get('/employee/addattendence',[AttendenceController::class, 'attendence'])->name('addattendence');
// 		Route::get('/employee/view-attendence',[AttendenceController::class, 'viewattendence'])->name('viewattendence');
// 		Route::post('/employee/attendenceAjax',[AttendenceController::class,'attendenceAjax'])->name('attendenceAjax');
// 		Route::post('/employee/viewattendenceajax',[AttendenceController::class,'viewattendenceajax'])->name('viewattendenceAjax');
// 		Route::post('/employee/filterattendenceajax',[AttendenceController::class,'filterattendenceajax'])->name('filterattendenceajax');
// 		Route::post('/employee/manualdatefilterajax',[AttendenceController::class,'manualdatefilterajax'])->name('manualdatefilterajax');
// 		Route::post('/employee/changestatusajax',[EmployeeController::class,'changestatusajax'])->name('changestatusajax');
// 		Route::post('/employee/enableajax',[EmployeeController::class,'enableajax'])->name('enableajax');
// >>>>>>> main

		
	});
	// Route::middleware(['can:isEmployee'])->group(function () {
		Route::get('/employee/view-employee-attendence',[AttendenceController::class, 'viewemployeeattendence'])->name('viewemployeeattendence');
		Route::get('/employee/apply-leaves',[LeaveController::class, 'applyleaves'])->name('apply_leaves');
		Route::post('/employee/store-apply-leaves',[LeaveController::class, 'storeapplyleaves'])->name('store_apply_leaves');
		Route::get('/employee/store-apply-leaves',[LeaveController::class, 'leaveapplyemail'])->name('leave_apply_email');
		Route::get('/employee/my-leaves',[LeaveController::class, 'myleaves'])->name('my_leaves');
		Route::get('/employee/edit-leaves/{id}',[LeaveController::class, 'editleave'])->name('edit_leaves');
		Route::post('/employee/update-leaves/{id}',[LeaveController::class, 'updateLeave'])->name('update_leaves');
		Route::get('/employee/update-leaves/{id}',[LeaveController::class, 'updateleaveapplyemail'])->name('update_leaves_email');
		Route::get('/employee/delete-leave/{id}',[LeaveController::class, 'deleteleave'])->name('delete_leave');
		Route::get('/employee/leaves-listing',[LeaveController::class, 'leaveslisting'])->name('leaves_listing');
		Route::post('/employee/approve-reject',[LeaveController::class, 'approverejectAjax'])->name('approve-reject');

		Route::get('/employee/upload-file',[GoogledriveController::class,'upload_file'])->name('upload_file');
		// Route::post('/employee/store-upload-files',[GoogledriveController::class,'file_upload'])->name('store_uploaded_file');
		Route::post('/employee/test',[GoogledriveController::class,'drive_store'])->name('test');

		// Route::post('/test', function(Request $request) {
			// Storage::disk('google')->put('test1.txt', 'Hello World how are you');
			// dd($request->file("upload_file"));
		// })->name('test');
	// });

	Route::get('/employee/addattendence',[AttendenceController::class, 'attendence'])->name('addattendence');
	Route::get('/employee/view-attendence',[AttendenceController::class, 'viewattendence'])->name('viewattendence');
	Route::post('/employee/attendenceAjax',[AttendenceController::class,'attendenceAjax'])->name('attendenceAjax');
	Route::post('/employee/viewattendenceajax',[AttendenceController::class,'viewattendenceajax'])->name('viewattendenceAjax');
	Route::post('/employee/filterattendenceajax',[AttendenceController::class,'filterattendenceajax'])->name('filterattendenceajax');
	Route::post('/employee/manualdatefilterajax',[AttendenceController::class,'manualdatefilterajax'])->name('manualdatefilterajax');

});

