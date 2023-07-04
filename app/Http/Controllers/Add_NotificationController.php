<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Add_Notification;

class Add_NotificationController extends Controller
{
    //
    public function add_notification($name, $date){
        $Notification = new Add_Notification;
        $Notification -> nametable = $name;
        $Notification -> date      = $date;
        $Notification -> save();
    }
}
