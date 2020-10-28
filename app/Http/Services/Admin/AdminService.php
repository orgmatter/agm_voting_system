<?php
namespace App\Http\Services\Admin;

use App\Models\Admin;
use App\Models\Shareholder;
use App\Models\VoteItem;
use App\Models\Company;
use App\Models\VoteCount;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminService 
{

    public function login(array $credentials)
    {
        $isLoggedIn = Auth::guard('admin')->attempt($credentials);
        if($isLoggedIn) {
            return $isLoggedIn;
        }
    }

    public function reset_password(string $old_password, string $new_password, int $id)
    {
        $hashed_new_password = Hash::make($new_password);
        $admin = Admin::find($id);
        if(Hash::check($old_password, $admin->password)) {
            $isPasswordUpdated = $admin->update(['password' => $hashed_new_password]);
            return $isPasswordUpdated;
        }
    }

    // --> companies
    public function read_companies()
    {
        return $companies = Company::all();
    }

    // --> shareholders
    public function create_shareholder(array $credentials, int $id)
    {
        $admin = Admin::find($id);
        $shareholder = $admin->shareholders()->create($credentials);
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
    public function create_vote(array $credentials, int $id)
    {
        $admin = Admin::find($id);
        $vote_item = $admin->vote_items()->create($credentials);
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
        $vote_item = VoteItem::find($id);
        $isDeletevote_item = $vote_item->delete();
        if($isDeleteVote) {
            return $isDeleteVote;
        }
    }

    public function read_vote_counts()
    {
        $distinct_votes = DB::table('vote_counts')->select('created_at', 'shareholder_id', 'vote_item_id', DB::raw('SUM(votes) as total_votes'))
        ->groupBy('shareholder_id')
        ->groupBy('vote_item_id')
        ->groupBy('created_at')
        ->get();
    }
}