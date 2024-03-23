<?php

namespace App\Providers;

use App\Services\Impl\PrestasiServiceImpl;
use App\Services\PrestasiService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class PrestasiServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public array $singletons = [
        PrestasiService::class => PrestasiServiceImpl::class
    ];

    public function provides(): array
    {
        return [PrestasiService::class];
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
