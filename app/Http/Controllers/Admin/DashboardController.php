<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\DashboardRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Company;
use App\Http\Services\Admin\AdminService;
use Illuminate\Support\Facades\Hash;


class DashboardController extends Controller
{
    private $adminService;

    // inject admin service dependency in construct
    public function __construct(AdminService $adminService) {
        
        $this->middleware('auth:admin');
        $this->adminService = $adminService;
    }

    public function dashboard() {

        $companies = $this->adminService->read_companies();
        $shareholders = $this->adminService->read_shareholders();
        $vote_items = $this->adminService->read_vote_items();
        $distinct_votes = $this->adminService->read_vote_counts();
        $admin = Auth::guard('admin')->user();

        return view('admin.dashboard', ['companies' => $companies, 'shareholders' => $shareholders, 'vote_items' => $vote_items, 'distinct_votes' => $distinct_votes, 'admin' => $admin]);
    }

    public function create_shareholder(Request $request)
    {
        $isValidated = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'password' => 'required',
            'units' => 'required',
            'company_id' => 'required'
        ]);

        if($isValidated) {
            $credentials = [
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'units' => $request->units,
                'company_id' => $request->company_id,
                'isEligible' => true,
            ];

            $admin_id = $request->user()->id;
            $shareholder = $this->adminService->create_shareholder($credentials, $admin_id);
            if($credentials) {
                return back()->with('shareholder_created', 'shareholder created');
            }
        }
    }

    public function delete_shareholder(DashboardRequest $request, $id)
    {
        $isDeleted = $this->adminService->delete_shareholder($id);
        if($isDeleted) {
            return back()->with('message', 'shareholder deleted');
        }
    }

    public function create_vote(Request $request)
    {
        $isValidated = $request->validate([
            'vote_name' => 'required',
            'company_id' => 'required',
        ]);

        if($isValidated) {
            $credentials = [
                'name' => $request->vote_name,
                'company_id' => $request->company_id,
            ];

            $admin_id = $request->user()->id;
            $vote = $this->adminService->create_vote($credentials, $admin_id);
            if($vote) {
                return back()->with('message', 'vote created');
            }
        }
    }

    public function update_vote(Request $request, $id)
    {
        $credentials = [
            'name' => $request->vote_name,
            'company_id' => $request->company_id,
        ];

        $isUpdated = $this->adminService->update_vote($credentials, $id);
        if($isUpdated) {
            return back()->with('message', 'vote updated');
        }
    }

    public function delete_vote($id)
    {
        $isDeleted = $this->adminService->delete_vote($id);
        if($isDeleted) {
            return back()->with('message', 'vote deleted');
        }
    }

    public function reset_password(DashboardRequest $request)
    {
        $user_id = $request->user()->id;
        $old_password = $request->old_password;
        $new_password = $request->new_password;
        $isPasswordReset = $this->adminService->reset_password($old_password, $new_password, $user_id);
        if($isPasswordReset) {
            return back()->with('password_reset', 'password is reset');
        }
    }


    public function show_edit_vote()
    {
        $votes = $this->adminService->read_votes();
        $companies = $this->adminService->read_companies();
        
        return view('', ['votes' => $votes, 'companies' => $companies]);
    }


    public function logout() {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.showLogin');
    }
}
