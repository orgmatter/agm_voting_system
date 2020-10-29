<?php

namespace App\Http\Controllers\Shareholder;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


// This controller determines an authenticated request to the shareholder resources

class AuthController extends Controller
{
    public function checkShareholderAuth()
    {
        return Auth::guard('shareholder')->check();
    }


    public function auth_shareholder()
    {
        return redirect(route('shareholder.dashboard'));
    }

    public function guest_shareholder()
    {
        return redirect(route('shareholder.showLogin'));
    }


    // check if the shareholder is authenticated
    public function shareholder()
    {
        if($this->checkShareholderAuth()) {
            return $this->auth_shareholder();
        }
        return $this->guest_shareholder();
    }
}
