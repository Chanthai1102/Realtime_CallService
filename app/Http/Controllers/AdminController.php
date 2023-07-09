<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\add_notification;
use Illuminate\Support\Facades\DB;
use App\Models\Accept_Nofitication;

class AdminController extends Controller
{
    //
    public function admin(){
        $table = DB::table('add__notification')
                 ->orderBy('id', 'DESC')
                 ->get();
        return view('Backend.notification',['table' => $table]);
    }
    public function accept_notification($id){
        $table = DB::table('add__notification')
                 ->where('id', $id)
                 ->first();
        $accept_table = new Accept_Nofitication;
        $accept_table -> nametable = $table -> nametable;
        $accept_table -> acceptdate = $table -> bookingdate;
        $accept_table -> save();

        DB::table('add__notification')
            ->where('id', $id)
            ->delete();

        return redirect(route('notification'));
    }
}
