<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TableController extends Controller
{
    //
    public function table(){
        return view('Backend.add_table');
    }
    public function table_submit(Request $request){
        return $request;
    }
}
