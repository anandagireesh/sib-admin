<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseAppliedController;

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



Route::get('/', [App\Http\Controllers\AdminController::class,'admin']);

Route::get('/admin/login',function ()  {
    return view('login');
});

Route::post('admin/post-login',[AuthController::class, 'adminLogin']);

// admin routes
Route::get('admin/courses-applied',[CourseAppliedController::class, 'appliedList']);
Route::get('admin/others-applied',[CourseAppliedController::class, 'othersAppliedList']);

