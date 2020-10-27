<?php
namespace App\Http\Services\Shareholder;

use App\Models\Shareholders;
use App\Models\VoteItem;
use App\Models\VoteCount;
use Illuminate\Support\Facades\Auth;

class ShareholderService
{
    public function login(array $credentials)
    {
        $isLoggedIn = Auth::guard('shareholder')->attempt($credentials);
        if($isLoggedIn) {
            return $isLoggedIn;
        }
    }

    public function reset_password(string $password, int $id)
    {
        $shareholder = Shareholder::find($id);
        $isUpdateShareholder = $shareholder->update(['password' => $password]);
        if($isUpdateShareholder) {
            return $isUpdateShareholder;
        }
    }

    public function read_company_votes(int $company_id)
    {
        $company_votes = VoteItem::where('company_id', $company_id)->first();
        if($company_votes) {
            return $company_votes;
        }
    }

    public function on_vote(array $credentials)
    {
        $vote_count = VoteCount::create($credentials);
        if($vote_count) {
            $shareholder = Shareholder::find($credentials['shareholder_id']);
            $shareholder_bal = $shareholder->update(['units' => ($shareholder->units - 1)]);
            return $shareholder_bal;
        }
    }
}