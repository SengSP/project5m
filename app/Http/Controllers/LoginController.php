<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth, DB, Validator;

class LoginController extends Controller
{
    // function index
    public function index(){
        $pagename = "ເບິ່ງລວມທັງໝົດ";
        return view('admin/index')->with('pagename', $pagename);
    }

    // function check user
    public function fnCheck(Request $req){
        $this->validate($req, [
            'username' => 'required',
            'password' => 'required|min:8'
        ]);

        $data = array(
            'name' => $req->input('username'),
            'password' => $req->input('password')
        );
        
        if(Auth::attempt($data)){
            // auth()->user()->assignRole('admin');
            return redirect('admin');
        }else{
            return back()->with('error', 'ບໍ່ມີບັນຊີນີ້ໃນລະບົບ');
        }
    }

    public function fnLogin(){
        return view('index');
    }

    // function logout
    public function fnLogout(){
        Auth::logout();
        return redirect('login');
    }

}
