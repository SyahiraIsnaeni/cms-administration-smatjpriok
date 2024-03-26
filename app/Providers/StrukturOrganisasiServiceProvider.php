<?php

namespace App\Providers;

use App\Services\Impl\StrukturOrganisasiServiceImpl;
use App\Services\StrukturOrganisasiService;
use Illuminate\Support\ServiceProvider;

class StrukturOrganisasiServiceProvider extends ServiceProvider
{
    public array $singletons = [
        StrukturOrganisasiService::class => StrukturOrganisasiServiceImpl::class
    ];

    public function provides(): array
    {
        return [StrukturOrganisasiService::class];
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
