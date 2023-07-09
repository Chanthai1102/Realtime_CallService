<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Table;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;

class TableController extends Controller
{
    //
    public function table(){
        $table = DB::table('tables')
            ->orderBy('id', 'DESC')
            ->get();
        return view('Backend.add_table',['table' => $table]);
    }
    public function table_submit(Request $request){
        $tablename = $request->tablename;
        $description = $request->description;

        $table = new Table();
        $table->tablename = $tablename;
        $table->description = $description;
        $table->save();

        return redirect(route('table'));
    }
    public function table_delete($id){
        DB::table('tables')
            ->where('id', $id)
            ->delete();
        return redirect(route('table'));
    }
}
