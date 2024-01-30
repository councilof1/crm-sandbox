<?php

namespace App\Providers;

use App\Models\Customer;
use App\Policies\CustomerPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Customer::class => CustomerPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
    // Implicitly grant "Super Admin" role all permissions
    // This works in the app by using gate-related functions like auth()->user->can() and @can()
    Gate::before(function ($user) {
        return $user->isSuperAdmin() ? true : null;
    });
    }
}
