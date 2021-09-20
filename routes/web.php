<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HelperController;
use App\Http\Controllers\WidgetController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\AttendenceController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;



Route::get('/',[LoginController::class,'index'])->name('index');
Route::get('/login',[LoginController::class,'login'])->name('login');
Route::post('/authenticate-login',[LoginController::class,'authenticate'])->name('authenticate');
Route::post('/logout',[LoginController::class,'logout'])->name('logout');



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
		Route::get('/employee/addattendence',[AttendenceController::class, 'attendence'])->name('addattendence');
		Route::get('/employee/viewattendence',[AttendenceController::class, 'viewattendence'])->name('viewattendence');
		Route::post('/employee/designationAjax',[EmployeeController::class,'designationAjax'])->name('designationAjax');
		Route::post('/employee/attendenceAjax',[EmployeeController::class,'attendenceAjax'])->name('attendenceAjax');
		
		
	});

    // Route::middleware(['admin'])->group(function () {
		
    // });


});

