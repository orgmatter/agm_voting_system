<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\User;
use App\Models\Shareholder;
use App\Models\VoteItem;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\Admin  $user
     * @return mixed
     */
    public function viewAny(Admin $admin)
    {
        return $admin->isAdmin === 1 ? true:false;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Admin  $admin
     * @return mixed
     */
    public function view(Admin $admin)
    {
        return $admin->isAdmin === 1 ? true:false;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $admin->isAdmin === 1 ? true:false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Admin  $admin
     * @return mixed
     */
    public function updateAdmin(Admin $admin)
    {
        return $admin->isAdmin === 1 ? true:false;
    }


    public function updateVoteItem(Admin $admin, VoteItem $vote_item)
    {
        $isAdmin = $admin->isAdmin === 1 ? true:false;

        if($isAdmin) {
            return $admin->id === $vote_item->admin_id;
        }

    }

    public function updateShareholderIsEligible(Admin $admin, Shareholder $shareholder) {

        return $admin->isAdmin === 1 ? true:false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Admin  $admin
     * @return mixed
     */
    public function deleteAdmin(Admin $admin)
    {
        return $admin->isAdmin === 1 ? true:false;
    }


    public function deleteVoteItem(Admin $admin, VoteItem $vote_item)
    {
        $isAdmin = $admin->isAdmin === 1 ? true:false;

        if($isAdmin) {
            return $admin->id === $vote_item->admin_id;
        }

    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Admin  $admin
     * @return mixed
     */
    public function restore(User $user, Admin $admin)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Admin  $admin
     * @return mixed
     */
    public function forceDelete(User $user, Admin $admin)
    {
        //
    }
}
