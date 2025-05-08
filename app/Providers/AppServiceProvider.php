<?php

namespace App\Providers;

use App\Repositories\Interfaces\ProvinceRepositoryInterface;
use App\Repositories\Interfaces\RegencyRepositoryInterface;
use App\Repositories\ProvinceRepository;
use App\Repositories\RegencyRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ProvinceRepositoryInterface::class, ProvinceRepository::class);
        $this->app->bind(RegencyRepositoryInterface::class, RegencyRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
