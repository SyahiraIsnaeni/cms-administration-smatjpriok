<?php

namespace App\Providers;

use App\Services\Impl\KritikSaranServiceImpl;
use App\Services\KritikSaranService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class KritikSaranServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public array $singletons = [
        KritikSaranService::class => KritikSaranServiceImpl::class
    ];

    public function provides(): array
    {
        return [KritikSaranService::class];
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
