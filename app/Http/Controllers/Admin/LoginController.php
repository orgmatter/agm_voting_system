<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illumnate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\LoginRequest;


// this controller is meant to resolve the login route;
class LoginController extends Controller
{
    
    public function __construct() {
        $this->middleware('guest:admin');
    }

    public function showLogin() {
        return view('admin.login');
    }


    public function login(LoginRequest $request) {

        $validated = $request->validated();

        if($validated) {
            
            if(Auth::attempt($request->only('email', 'password'))) {

                return redirect()->route('admin.dashboard');
            }
            return back()->withInput($request->except('password'));
        }
    }

}
