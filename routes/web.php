<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\FrontEndController;

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
//AUTH
Route::get('/',[FrontEndController::class,"index"])->name("home");
Route::get('/dashboard',[FrontEndController::class,"dashboard"])->name("dashboard");
Route::get("/api/login",[FrontEndController::class,"login"])->name("login");
Route::post("/api/login",[FrontEndController::class,"login_submit"]);
Route::get("/api/register",[FrontEndController::class,"register"])->name('register');
Route::post("/api/register",[FrontEndController::class,"register_submit"]);
Route::get('logout', [FrontEndController::class,"logout"])->name("logout");


//session
Route::get("/api/session/",[SessionController::class,"index"]);
Route::post("/api/session",[SessionController::class,"store"]);
Route::get("/api/session/add/{id}",[SessionController::class,"show"]);


//course
Route::get("/api/course",[CourseController::class,"index"])->name('course');
Route::post("/api/course",[CourseController::class,"store"]);
Route::get("/course/{id}",[CourseController::class,"show"]);







