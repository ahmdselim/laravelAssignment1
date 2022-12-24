<?php

use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\MealController;
use App\Http\Controllers\front\AboutController;
use App\Http\Controllers\front\ContactUsController;
use App\Http\Controllers\front\ProductController;
use App\Http\Controllers\front\TeamsController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, "index"])->name("/");
Route::get('/about', [AboutController::class, "index"])->name("about");
Route::get('/teams', [TeamsController::class, "index"])->name("teams")->middleware("myAuth");
Route::get('/contactUs', [ContactUsController::class, "index"])->name("contactUs");
Route::get('/menu', [ProductController::class, "index"])->name("menu");
Route::post('/sendMessage', [ContactUsController::class, "sendMessage"])->name("sendMessage");
Route::get('/dashboard', [DashboardController::class, "index"])->name("dashboard");

Route::resource("/dashboard/category", CategoryController::class);
Route::resource("/dashboard/meal", MealController::class);
