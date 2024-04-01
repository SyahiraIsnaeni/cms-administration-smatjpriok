<?php

namespace App\Providers;

use App\Services\Impl\StafServiceImpl;
use App\Services\StafService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class StafServiceProvider extends ServiceProvider implements DeferrableProvider
{

    public array $singletons = [
        StafService::class => StafServiceImpl::class
    ];

    public function provides(): array
    {
        return [StafService::class];
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
