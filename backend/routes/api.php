<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\CompanyEmployeeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// public routes
Route::get('/companies',[CompanyController::class,'index']);
Route::post('/register',[UserAuthController::class,'register']);
Route::post('/login',[UserAuthController::class,'login']);

// Protected routes
Route::group(['middleware' => ['auth:sanctum']],function () {
    Route::post('/logout',[UserAuthController::class,'logout']);
    // company routes
    Route::get('/companies',[CompanyController::class,'index']);
    Route::get('/company/{id}',[CompanyController::class,'show']);
    Route::post('/companies/create',[CompanyController::class,'store']);
    Route::put('/companies/update/{id}',[CompanyController::class,'update']);
    // company emoloyee routes
    Route::get('/employees',[CompanyEmployeeController::class,'index']);
    Route::get('/employee/{id}',[CompanyEmployeeController::class,'show']);
    Route::post('/employee/create',[CompanyEmployeeController::class,'store']);
    Route::put('/employee/update/{id}',[CompanyEmployeeController::class,'update']);
    Route::delete('/employee/{id}',[CompanyEmployeeController::class,'destroy']);
    // jobs routes
    Route::get('/jobs',[JobController::class,'index']);
    Route::get('/job/{id}',[JobController::class,'show']);
    Route::post('/job/create',[JobController::class,'store']);
    Route::put('/job/update/{id}',[JobController::class,'update']);
    Route::delete('/job/{id}',[JobController::class,'destroy']);
});
