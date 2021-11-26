<?php

use App\Http\Controllers\API\ExtensiontestController;
use App\Http\Controllers\API\TestingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
     return $request->user();
});


Route::get('apihrms',[TestingController::class,'api_hrms'])->middleware('throttle:1,0.5');
Route::get('extensiontest',[ExtensiontestController::class,'extensiontest']);
  
 

// Route::get('/login',[LoginController::class,'login'])->name('login');

