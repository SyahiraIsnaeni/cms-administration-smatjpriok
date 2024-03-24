<?php

namespace App\Providers;

use App\Services\BlogService;
use App\Services\Impl\BlogServiceImpl;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class BlogServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public array $singletons = [
        BlogService::class => BlogServiceImpl::class
    ];

    public function provides(): array
    {
        return [BlogService::class];
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
