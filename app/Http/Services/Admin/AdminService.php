<?php
namespace App\Http\Services\Admin;

use App\Models\Admin;
use App\Models\Shareholder;
use App\Models\VoteItem;
use App\Models\Company;
use Illuminate\Support\Facades\Auth;

class AdminService 
{

    public function login(array $credentials)
    {
        $isLoggedIn = Auth::guard('admin')->attempt($credentials);
        if($isLoggedIn) {
            return $isLoggedIn;
        }
    }

    public function reset_password(string $password, int $id)
    {
        $admin = Admin::find($id);
        $isUpdated = $admin->update(['password' => $password]);
        if($isUpdated) {
            return $isUpdated;
        }
    }

    // --> companies
    public function read_companies()
    {
        return $companies = Company::all();
    }

    // --> shareholders
    public function create_shareholder($credentials)
    {
        $shareholder = Shareholder::create($credentials);
        if(isset($shareholder)) {
            return $shareholder;
        }
    }

    public function read_shareholders()
    {
        return $shareholders = Shareholder::all();
    }

    public function delete_shareholder(int $id)
    {
        $shareholder = Shareholder::find($id);
        $isDeleteShareholder = $shareholder->delete();
        if($isDeleteShareholder) {
            return $isDeleteShareholder;
        }
    }


    // --> vote items
    public function create_vote(array $credentials)
    {
        $vote_item = VoteItem::create($credentials);
        if(isset($vote_item)) {
            return $vote_item;
        }
    }

    public function read_vote_items()
    {
        $vote_items = VoteItem::all();
        if($vote_items) {
            return $vote_items;
        }
    }

    public function update_vote(array $credentials, int $id)
    {
        $vote_item = VoteItem::find($id);
        $isUpdateVote = $vote_item->update($credentials);
        if(isset($vote_item)) {
            return $vote_item;
        }
    }

    public function delete_vote(int $id)
    {
        $vote_item = voteItem::find($id);
        $isDeletevote_item = $vote_item->delete();
        if($isDeleteVote) {
            return $isDeleteVote;
        }
    }
}