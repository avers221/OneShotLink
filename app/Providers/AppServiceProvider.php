<?php

namespace App\Providers;

use App\Application\OneShotLink\Services\OneShotLinkManager;
use App\Domain\OneShotLink\Repository\OneShotLinkRepositoryInterface;
use App\Infrastructure\OneShotLink\Listeners\UpdateLinkOpenAt;
use App\Infrastructure\OneShotLink\Persistence\Eloquent\Repositories\OneShotLinkRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->when(OneShotLinkManager::class)
            ->needs(OneShotLinkRepositoryInterface::class)
            ->give(OneShotLinkRepository::class);

        $this->app->when(UpdateLinkOpenAt::class)
            ->needs(OneShotLinkRepositoryInterface::class)
            ->give(OneShotLinkRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
