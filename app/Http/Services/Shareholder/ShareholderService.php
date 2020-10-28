<?php
namespace App\Http\Services\Shareholder;

use App\Models\Shareholder;
use App\Models\VoteItem;
use App\Models\VoteCount;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ShareholderService
{
    public function login(array $credentials)
    {
        $isLoggedIn = Auth::guard('shareholder')->attempt($credentials);
        if($isLoggedIn) {
            return $isLoggedIn;
        }
    }

    public function reset_password(string $old_password, string $new_password, int $id)
    {
        $shareholder = Shareholder::find($id);

        if(Hash::check($old_password, $shareholder->password)) {
            $hashed_new_password = Hash::make($new_password);
            $isPasswordUpdated = $shareholder->update(['password' => $hashed_new_password]);
            if($isPasswordUpdated) {
                return $isPasswordUpdated;
            }
        }
    }

    public function read_company_votes(int $company_id)
    {
        $company_votes = VoteItem::where('company_id', $company_id)->get();
        if($company_votes) {
            return $company_votes;
        }
    }

    public function on_vote(array $credentials, int $id)
    {
        $shareholder = Shareholder::find($id);
        $vote_count = $shareholder->vote_counts()->create($credentials);
        if($vote_count) {
            $new_units = $shareholder->units - $credentials['votes'];
            $shareholder_bal = $shareholder->update(['units' => $new_units]);
            return $shareholder_bal;
        }
    }
}