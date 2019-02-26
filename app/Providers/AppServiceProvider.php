<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\V1\Todo\TodoRepository;
use App\Repositories\V1\Todo\TodoRepositoryInterface;
use App\Repositories\V1\User\UserRepository;
use App\Repositories\V1\User\UserRepositoryInterface;
use App\Repositories\V1\Calendar\CalendarRepository;
use App\Repositories\V1\Calendar\CalendarRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(TodoRepositoryInterface::class, TodoRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(CalendarRepositoryInterface::class, CalendarRepository::class);
    }
}
