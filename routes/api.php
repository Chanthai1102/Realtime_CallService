<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Add_Notification;
use Carbon\Carbon;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/test', function (Request $req){
    event(new App\Events\RealTimeMessage($req->get("table")));
    return $req->get("table");
});


Route::post('/table', function (Request $req){
    $Notification = new Add_Notification();
    $Notification -> nametable = $req->get("table");
    $currentTime = Carbon::now();
    $Notification -> bookingdate = $currentTime;
    $Notification -> save();
    return $req->get("table");
});
