<?php

namespace App\Providers;

use App\Services\Impl\PengumumanServiceImpl;
use App\Services\PengumumanService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class PengumumanServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public array $singletons = [
        PengumumanService::class => PengumumanServiceImpl::class
    ];

    public function provides(): array
    {
        return [PengumumanService::class];
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
