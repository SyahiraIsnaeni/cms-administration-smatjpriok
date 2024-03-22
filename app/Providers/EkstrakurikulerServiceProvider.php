<?php

namespace App\Providers;

use App\Services\Impl\EkstrakurikulerServiceImpl;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use App\Services\EkstrakurikulerService;

class EkstrakurikulerServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public array $singletons = [
        EkstrakurikulerService::class => EkstrakurikulerServiceImpl::class
    ];

    public function provides(): array
    {
        return [EkstrakurikulerService::class];
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
