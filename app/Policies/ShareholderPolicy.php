<?php

namespace App\Policies;

use App\Models\Shareholder;
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
    public function viewVoteItem(Shareholder $shareholder)
    {
        return $shareholder->isEligible === 1? true:false;
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
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Shareholder  $shareholder
     * @return mixed
     */
    public function updateShareholder(Shareholder $shareholder)
    {
        return true
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
