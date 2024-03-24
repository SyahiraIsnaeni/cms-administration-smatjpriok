<?php

namespace App\Providers;

use App\Services\Impl\KategoriPengumumanServiceImpl;
use App\Services\KategoriPengumumanService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class KategoriPengumumanServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public array $singletons = [
        KategoriPengumumanService::class => KategoriPengumumanServiceImpl::class
    ];

    public function provides(): array
    {
        return [KategoriPengumumanService::class];
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
