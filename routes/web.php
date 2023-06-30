<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TableController;

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
        Route::get('/table-add', [TableController::class, 'table'])->name('table-add');
        Route::post('/table-add/submit', [TableController::class, 'table_submit'])->name('table-submit');
    });
});
