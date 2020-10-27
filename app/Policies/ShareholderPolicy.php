<?php

namespace App\Policies;

use App\Models\Shareholder;
use App\Models\VoteItem;
use App\Models\VoteCount;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ShareholderPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\Shareholder  $user
     * @return mixed
     */
    public function viewVoteItem(Shareholder $shareholder, VoteItem $vote_item)
    {
        return $shareholder->company_id === $vote_item->company_id;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Shareholder  $shareholder
     * @return mixed
     */
    public function updateShareholder(Shareholder $shareholder)
    {
        return true;
    }

    public function shareholderVote(Shareholder $shareholder)
    {
        return $shareholder->isEligible === 1? true:false;
    }

    public function viewVoteCounts(Shareholder $shareholder, VoteCount $vote_count)
    {
        return $shareholder->id === $vote_count->shareholder_id;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Shareholder  $user
     * @param  \App\Models\Shareholder  $shareholder
     * @return mixed
     */
    public function view(User $user, Shareholder $shareholder)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }


    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Shareholder  $shareholder
     * @return mixed
     */
    public function delete(User $user, Shareholder $shareholder)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Shareholder  $shareholder
     * @return mixed
     */
    public function restore(User $user, Shareholder $shareholder)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Shareholder  $shareholder
     * @return mixed
     */
    public function forceDelete(User $user, Shareholder $shareholder)
    {
        //
    }
}
