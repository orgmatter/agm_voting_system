<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function checkAdminAuth()
    {
        return Auth::guard('admin')->check();
    }


    public function auth_admin()
    {
        return redirect(route('admin.dashboard'));
    }

    public function guest_admin()
    {
        return redirect(route('admin.showLogin'));
    }


    // check if the admin is authenticated
    public function admin()
    {
        if($this->checkAdminAuth()) {
            return $this->auth_admin();
        }
        return $this->guest_admin();
    }
}
