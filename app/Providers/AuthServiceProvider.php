<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
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
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('edit-create-delete-status', function ($user) {
            return $user != null;
        });

        Gate::define('edit-create-task', function ($user) {
            return $user != null;
        });

        Gate::define('delete-task', function ($user, $task) {
            return $user->id === $task->creator_by_id;
        });
    }
}
