<?php

namespace App\Providers;

use App\Policies\MedicationPolicy;
use App\Services\MedicationService;
use Illuminate\Support\Facades\Gate;
use App\Contracts\MedicationInterface;
use Illuminate\Support\ServiceProvider;

class MedicationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(MedicationInterface::class, function () {
            return new MedicationService();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Gate::define('create-medication', [MedicationPolicy::class, 'create']);
        Gate::define('update-medication', [MedicationPolicy::class, 'update']);
        Gate::define('delete-medication', [MedicationPolicy::class, 'delete']);
    }
}
