<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class AuthController extends Controller
{
    public function login(Request $request){
        $email = 'n@gmail.com';
        $pass = '123';

        if(($request->uemail == $email) && ($request->upass == $pass)){
            $request->session()->put('userloginId', $email);
            return redirect('home');
        }
        return back();
    }
    public function logout(Request $request){
        if (Session::has('userloginId')) {
            Session::pull('userloginId');
            return redirect('/');
        }
       
    }

    public function userHome(){
        return view('index');
    }
    public function product_view(){
        return view('product');
    }
}
