<?php

namespace App\Providers;

use App\Services\Impl\BeritaServiceImpl;
use App\Services\BeritaService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class BeritaServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public array $singletons = [
        BeritaService::class => BeritaServiceImpl::class
    ];

    public function provides(): array
    {
        return [BeritaService::class];
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
