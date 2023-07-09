<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\Add_NotificationController;

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
//Login
Route::get('/login', [UserController::class, 'Login'])->name('login');
Route::post('/login/submit', [UserController::class, 'login_submit']);
//Register
Route::get('/register', [UserController::class, 'Register']);
Route::post('/register/submit', [UserController::class, 'register_submit']);
//Admin Route
Route::prefix('/admin')->group(function (){
    Route::middleware(['auth'])->group(function (){
        Route::get('/', [AdminController::class, 'admin'])->name('notification');
        Route::get('/accept/{id}', [AdminController::class, 'accept_notification']);
        Route::get('/table', [TableController::class, 'table'])->name('table');
        Route::post('/table/submit', [TableController::class, 'table_submit'])->name('table-submit');
        Route::get('/table/delete/{id}', [TableController::class, 'table_delete']);
    });
});
