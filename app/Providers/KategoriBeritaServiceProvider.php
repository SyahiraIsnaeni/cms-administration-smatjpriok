<?php

namespace App\Providers;

use App\Services\Impl\KategoriBeritaServiceImpl;
use App\Services\KategoriBeritaService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class KategoriBeritaServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public array $singletons = [
        KategoriBeritaService::class => KategoriBeritaServiceImpl::class
    ];

    public function provides(): array
    {
        return [KategoriBeritaService::class];
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
