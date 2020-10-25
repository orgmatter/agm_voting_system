<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illumnate\Support\Facades\Auth;
use App\Models\Company;

class DashboardController extends Controller
{

    public function __construct() {
        $this->middleware('auth:admin');
    }

    public function dashboard() {

        $companies = Company::all();

        return view('admin.dashboard', ['companies' => $companies]);
    }


    public function logout() {
        if(Auth::guard('admins')->logout()) {
            
            return redirect()->route('showLogin');
        }
    }
}
