<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\add_notification;

class AdminController extends Controller
{
    //
    public function admin(){
        $table = add_notification::all();
        return view('Backend.notification',['table' => $table]);
    }
}
