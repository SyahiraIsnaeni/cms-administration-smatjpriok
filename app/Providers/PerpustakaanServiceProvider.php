<?php

namespace App\Providers;

use App\Services\Impl\PerpustakaanServiceImpl;
use App\Services\PerpustakaanService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class PerpustakaanServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public array $singletons = [
        PerpustakaanService::class => PerpustakaanServiceImpl::class
    ];

    public function provides(): array
    {
        return [PerpustakaanService::class];
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
