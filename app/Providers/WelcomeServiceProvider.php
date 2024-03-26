<?php

namespace App\Providers;

use App\Services\Impl\WelcomeServiceImpl;
use App\Services\WelcomeService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class WelcomeServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public array $singletons = [
        WelcomeService::class => WelcomeServiceImpl::class
    ];

    public function provides(): array
    {
        return [WelcomeService::class];
    }

    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
