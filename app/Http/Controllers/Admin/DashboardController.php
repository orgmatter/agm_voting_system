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

        // $companies = Company::all();

        $companies = $this->adminService->read_companies();
        $shareholders = $this->adminService->read_shareholders();
        $vote_items = $this->adminService->read_vote_items();

        return view('admin.dashboard', ['companies' => $companies, 'shareholders' => $shareholders, 'vote_items' => $vote_items]);
    }

    public function create_shareholder(DashboardRequest $request)
    {
        $isValidated = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'password' => 'required',
            'units' => 'required',
        ]);

        if($isValidated) {
            $credentials = [
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'units' => $request->units,
            ];

            $shareholder = $this->adminService->create_shareholder($credentials);
            if($credentials) {
                return back()->with('message', 'shareholder created');
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

    public function create_vote(DashboardRequest $request)
    {
        $isValidated = $request->validate([
            'name' => 'required',
            'company_id' => 'required',
        ]);

        if($isValidated) {
            $credentials = [
                'name' => $request->vote_name,
                'company_id' => $request->company_id,
                'admin_id' => $request->user('id'),
            ];

            $vote = $this->adminService->create_vote($credentials);
            if($vote) {
                return back()->with('message', 'vote created');
            }
        }
    }

    public function update_vote(DashboardRequest $request, $id)
    {
        $isUpdated = $this->adminService->update_vote($request->input(), $id);
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
        $user_id = $request->user('id');
        $password = $request->password;
        $isReset = $this->adminService->reset_password($password, $user_id);
        if($isReset) {
            return back()->with('message', 'password is reset');
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
