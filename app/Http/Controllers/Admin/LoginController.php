<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illumnate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\LoginRequest;
use App\Http\Services\Admin\AdminService;


// this controller is meant to resolve the login route;
class LoginController extends Controller
{
    private $adminService;

    public function __construct(AdminService $adminService) {
        $this->middleware('guest:admin');
        $this->adminService = $adminService;
    }

    public function showLogin() {
        return view('admin.login');
    }


    public function login(LoginRequest $request) {

        $validated = $request->validated();

        if($validated) {
            $credentials = [
                'email' => $request->email,
                'password' => $request->password,
            ];

            $isLoggedIn = $this->adminService->login($credentials);
            if($isLoggedIn) {
                return redirect()->route('admin.dashboard');
            }
            return back()->withInput($request->except('password'));
        }
    }

}
