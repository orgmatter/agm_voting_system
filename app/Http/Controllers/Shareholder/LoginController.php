<?php

namespace App\Http\Controllers\Shareholder;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Shareholder\ShareholderService;

class LoginController extends Controller
{
    private $shareholderService;

    public function __construct(ShareholderService $shareholderService) {
        $this->middleware('guest:shareholder');
        $this->shareholderService = $shareholderService;
    }

    public function showLogin() {
        return view('shareholder.login');
    }


    //--> shareholder login to dashboard
    public function login(Request $request) {

        $validated = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if($validated) {
            $credentials = [
                'email' => $request->email,
                'password' => $request->password,
            ];

            $isLoggedIn = $this->shareholderService->login($credentials);
            if($isLoggedIn) {
                return redirect()->route('shareholder.dashboard');
            }
            return back()->withInput($request->except('password'));
        }
    }
}
