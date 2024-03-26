<?php

namespace App\Providers;

use App\Services\EkstrakurikulerService;
use App\Services\GaleriService;
use App\Services\Impl\GaleriServiceImpl;
use Illuminate\Support\ServiceProvider;

class GaleriServiceProvider extends ServiceProvider
{
    public array $singletons = [
        GaleriService::class => GaleriServiceImpl::class
    ];

    public function provides(): array
    {
        return [GaleriService::class];
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
