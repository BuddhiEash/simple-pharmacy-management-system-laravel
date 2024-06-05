<?php

namespace App\Providers;

use App\Policies\CustomerPolicy;
use App\Services\CustomerService;
use App\Contracts\CustomerInterface;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class CustomerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(CustomerInterface::class, function () {
            return new CustomerService();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Gate::define('create-customer', [CustomerPolicy::class, 'create']);
        Gate::define('update-customer', [CustomerPolicy::class, 'update']);
        Gate::define('delete-customer', [CustomerPolicy::class, 'delete']);
    }
}
