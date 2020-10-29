<?php

namespace App\Http\Controllers\Shareholder;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Shareholder\ShareholderService;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    
    private $shareholderService;

    public function __construct(ShareholderService $shareholderService) {
        
        $this->middleware('auth:shareholder');
        $this->shareholderService = $shareholderService;
    }

    public function checkAuth() {
        return Auth::guard('shareholder')->check();
    }

    public function dashboard() {

        if(!$this->checkAuth()) {
            return redirect()->route('shareholder.showLogin');
        }

        // --> all the resources the shareholder can view in the dashboard
        $company_id = Auth::guard('shareholder')->user()->company_id;
        $company_votes = $this->shareholderService->read_company_votes($company_id);
        $shareholder = Auth::guard('shareholder')->user();

        return view('shareholder.dashboard', ['shareholder' => $shareholder, 'company_votes' => $company_votes]);
    }

    public function on_vote($id)
    {
        $user_id = Auth::guard('shareholder')->user()->id;
        $credentials = [
            'vote_item_id' => $id,
            'shareholder_id' => $user_id,
            'votes' => 1,
        ];
        $shareholder_bal = $this->shareholderService->on_vote($credentials, $user_id);
        if($shareholder_bal) {
            return redirect()->route('shareholder.dashboard');
        }
    }

    public function reset_password(Request $request)
    {
        $validated = $request->validate([
            'old_password' => 'required',
            'new_password' => 'required',
        ]);

        if($validated) {
            $old_password = $request->old_password;
            $new_password = $request->new_password;
            $user_id = $request->user()->id;
            $isPasswordReset = $this->shareholderService->reset_password($old_password, $new_password, $user_id);
            if($isPasswordReset) {
                return back()->with('password_reset', 'password is reset');
            }

            return back()->with('password_reset', 'password is not reset');
        }
        
    }


    public function logout() {
        Auth::guard('shareholder')->logout();
        return redirect()->route('shareholder.showLogin');
    }
}
