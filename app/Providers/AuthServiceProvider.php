<?php

namespace App\Providers;

use App\Member;
use Laravel\Passport\Passport;
use Illuminate\Support\Facades\Gate;
use App\Policies\AccessLocationPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
    * The policy mappings for the application.
    *
    * @var array
    */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        Member::class => AccessLocationPolicy::class
    ];

    /**
    * Register any authentication / authorization services.
    *
    * @return void
    */
    public function boot()
    {
        $this->registerPolicies();

        if (!app()->runningInConsole()) {
            // Passport::routes();
        };

        Gate::resource('member', 'App\Policies\AccessLocationPolicy');
        // Gate::define('member-viewAny', 'App\Policies\AccessLocationPolicy@viewAny');
    }
}
