<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Admin;
use App\Models\Shareholder;
use App\Policies\AdminPolicy;
use App\Policies\ShareholderPolicy;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Admin::class => AdminPolicy::class,
        Shareholder::class => ShareholderPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // defining gates for admin
        Gate::define('create', 'App\Policies\AdminPolicy@create');
        Gate::define('view', 'App\Policies\AdminPolicy@view');
        Gate::define('view-any', 'App\Policies\AdminPolicy@viewAny');
        Gate::define('update-admin', 'App\Policies\AdminPolicy@updateAdmin');
        Gate::define('delete-admin', 'App\Policies\AdminPolicy@deleteAdmin');
        Gate::define('update-shareholder-isEligible', 'App\Policies\AdminPolicy@updateShareholderIsEligible');

        // defining gates for shareholders
        Gate::define('update-shareholder', 'App\Policies\ShareholderPolicy@updateShareholder');
        Gate::define('view-vote-item', 'App\Policies\ShareholderPolicy@viewVoteItem');
        Gate::define('update-vote-item', 'App\Policies\AdminPolicy@updateVoteItem');
        Gate::define('delete-vote-item', 'App\Policies\AdminPolicy@deleteVoteItem');
        Gate::define('shareholder-vote', 'App\Policies\ShareholderPolicy@shareholderVote');
        Gate::define('view-vote-count', 'App\Policies\ShareholderPolicy@viewVoteCounts');
    }
}
