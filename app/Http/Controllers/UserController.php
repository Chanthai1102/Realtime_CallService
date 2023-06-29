<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class UserController extends Controller
{
    //
    public function Login(){
        return view('Backend.login');
    }
    public function login_submit(Request $request){
        if(Auth::attempt(['email' => $request->email_username, 'password' => $request->password])) {
            return redirect('/admin');
        }
        elseif(Auth::attempt(['name' => $request->email_username, 'password' => $request->password])) {
            return redirect('/admin');
        }
        else {
            return redirect('/login');
        }
    }
    public function Register(){
        return view('Backend.register');
    }
    public function register_submit(Request $request){
        $name      = $request->username;
        $email     = $request->email;
        $password  = Hash::make($request->password);

        User::create([
            'name'     => $name,
            'email'    => $email,
            'password' => $password,
        ]);
        return redirect('/register');
    }
}
