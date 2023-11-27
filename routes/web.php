<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get("/login", [App\Http\Controllers\Auth\AuthController::class, 'login'])->name("login");
Route::get("/logout", [App\Http\Controllers\Auth\AuthController::class, 'logout'])->name("auth.logout");
Route::post("/login/auth", [App\Http\Controllers\Auth\AuthController::class, 'authLogin'])->name("login.auth");
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth']], function () {
    Route::resource("users", App\Http\Controllers\Admin\UserController::class);
    Route::resource('projects' , App\Http\Controllers\Admin\ProjectsController::class);
    Route::resource('partner' , App\Http\Controllers\Admin\PartnerContorller::class);
});
