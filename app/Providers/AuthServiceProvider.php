<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;

class AuthServiceProvider extends ServiceProvider
{
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);
        //check for admin
        //return true if auth user type = admin
        $gate->define('isAdmin', function($user)
        {
            return $user->user_type == 'admin';
        });

        //check for supervisor
        //return true if user type = supervisor
        $gate->define('isSupervisor', function($user)
        {
            return $user->user_type == 'supervisor';
        });

        //check for student
        //return treu if user type = student
        $gate->define('isStudent', function($user)
        {
            return $user->user_type == 'student';
        });
    }
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    // public function boot()
    // {
    //     $this->registerPolicies();

    //     //
    // }
}