<?php

namespace App\Providers;

use App\Services\FasilitasService;
use App\Services\Impl\FasilitasServiceImpl;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class FasilitasServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public array $singletons = [
        FasilitasService::class => FasilitasServiceImpl::class
    ];

    public function provides(): array
    {
        return [FasilitasService::class];
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
