<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HelperController;
use App\Http\Controllers\WidgetController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\auth\ResetPasswordController;



Route::get('/',[LoginController::class,'index'])->name('index');
Route::get('/login',[LoginController::class,'login'])->name('login');
Route::post('/authenticate-login',[LoginController::class,'authenticate'])->name('authenticate');
Route::post('/logout',[LoginController::class,'logout'])->name('logout');
/*
Route::get('reset', function () {
    return view('auth.passwords.email');
});
Route::get('user', function () {
    return view('user');
});
// Route::get('/dashboard', [DashboardController::class,'index'])->name("dashboard");

Route::get('/register',[RegisterController::class,'register'])->name('register');
Route::post('/check',[LoginController::class,'check'])->name('check');
Route::post('/save',[RegisterController::class,'save'])->name('save');
Route::get('passwords',[ResetPasswordController::class,'passwords'])->name('passwords');
Route::get('/logout',[LoginController::class,'logout'])->name('logout');*/
// Route::get('/reset',[DashboardController::class,'logout'])->name('logout');
// Route::get('/forgotpassword',[DashboardController::class,'forgotpassword'])->name('forgotpassword');
// Route::get('/profilepage',[DashboardController::class,'profilepage'])->name('profilepage');

// Auth::routes();
Route::group(['middleware'=>'auth'],function(){

	Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
	Route::get('/employees',[EmployeeController::class,'listing'])->name('employeesListing');
	Route::get('/employee/add',[EmployeeController::class,'add'])->name('addEmployee');
	// Route::get('/employee/add',[EmployeeController::class,'add'])->middleware(['can:isAdmin'])->name('addEmployee');
	Route::post('/employee/store',[EmployeeController::class,'store'])->name('storeEmployee');
	Route::get('/employee/edit/{id}',[EmployeeController::class, 'edit'])->name('editEmployee');
    Route::post('/employee/update/{id}',[EmployeeController::class, 'updateEmployee'])->name('updateEmployee');
	Route::get('/employee/delete/{id}',[EmployeeController::class, 'delete'])->name('deleteEmployee');
	Route::get('/employee/profile',[EmployeeController::class, 'employeeDetails'])->name('employeeDetails');
	Route::get('/change-password',[EmployeeController::class, 'viewPassword'])->name('changePassword');
	Route::post('/change-password',[EmployeeController::class, 'changePassword'])->name('changePassword');

	Route::get('/helper',[HelperController::class,'index'])->name('helper');
	Route::get('/widget',[WidgetController::class,'index'])->name('widget');	
	Route::get('/table',[TableController::class,'index'])->name('table');
	Route::get('/media',[MediaController::class,'index'])->name('media');
	Route::get('/chart',[ChartController::class,'index'])->name('chart');
});

Route::group(['middleware'=>'adminhr'],function(){
	Route::get('/employee/add',[EmployeeController::class,'add'])->name('addEmployee');
	Route::get('/employee/edit/{id}',[EmployeeController::class, 'edit'])->name('editEmployee');
});


// Route::group(['middleware'=>'admin'],function(){

// });