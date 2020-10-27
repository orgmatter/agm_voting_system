<?php

namespace App\Http\Controllers\Shareholder;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Shareholder\ShareholderService;

class DashboardController extends Controller
{
    
    private $shareholderService;

    public function __construct(ShareholderService $shareholderService) {
        $this->middleware('auth:shareholder');
        $this->$shareholderService = $shareholderService;
    }

    public function dashboard() {


        // --> all the resources the shareholder can view in the dashboard
        $company_id = Auth::guard('sharholder')->user('company_id');
        $company_votes = $this->shareholderService->read_company_votes($company_id);
        $shareholder = Auth::guard('sharholder')->user();

        return view('shareholder.dashboard', ['shareholder' => $shareholder, 'company_votes' => $company_votes]);
    }

    public function on_vote($id)
    {
        $user_id = Auth::guard('shareholder')->user('id');
        $credentials = [
            'vote_item_id' => $id,
            'shareholder_id' => $user_id,
            'votes' => 1,
        ];
        $shareholder_bal = $this->shareholderService->on_vote($credentials);
        if($shareholder_bal) {
            return back()->with(['shareholder_bal' => $shareholder_bal]);
        }
    }

    public function reset_password(DashboardRequest $request)
    {
        $user_id = $request->user('id');
        $password = $request->password;
        $isReset = $this->shareholderService->reset_password($password, $user_id);
        if($isReset) {
            return back()->with('message', 'password is reset');
        }
    }


    public function logout() {
        if(Auth::guard('shareholder')->logout()) {
            
            return redirect()->route('shareholder.showLogin');
        }
    }
}
