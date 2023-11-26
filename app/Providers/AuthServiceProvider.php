<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\VehicleDamageEvent;
use App\Policies\VehicleDamageEventPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        VehicleDamageEvent::class => VehicleDamageEventPolicy::class,
        Vehicle::class => VehiclePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
    }
}
