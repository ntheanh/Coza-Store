<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        //     return redirect()->intended('dashboard');
        // }

        if (Auth::attempt([
            'email' => $request->input("email"),
            'password' => $request->input('password')
        ],
        $request->input('remember'))){
            return redirect()->route('admin');
        }
        return redirect()->back();
    }
}