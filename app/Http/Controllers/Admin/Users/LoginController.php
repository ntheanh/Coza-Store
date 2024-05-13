<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index(){
    return view('admin.users.login',[
        'title' => 'Login'
    ]);
    }

    public function store(Request $request){
        // dd($request->input());
        $this->validate($request,[
            'email' => 'required|email:filter',
            'password' => 'required'
        ]);

        // $credentials = $request->only('email', 'password');
        // if (Auth::attempt($credentials)) {
        //     // Authentication passed...
        //     return redirect()->intended('admin');
        // }

        if (Auth::attempt([
            'email' => $request->input("email"),
            'password' => $request->input('password')
        ],
        $request->input('remember'))){
            return redirect()->route('admin');
        }

        Session::flash('error','Email or Password Wrong');
        // $request->session()->flash('error', 'Email or Password Wrong');

        return redirect()->back();
    }
}