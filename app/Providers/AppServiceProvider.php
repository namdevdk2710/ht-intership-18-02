<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\V1\Todo\TodoRepository;
use App\Repositories\V1\Todo\TodoRepositoryInterface;
use App\Repositories\V1\User\UserRepository;
use App\Repositories\V1\User\UserRepositoryInterface;
use App\Repositories\V1\Calendar\CalendarRepository;
use App\Repositories\V1\Calendar\CalendarRepositoryInterface;
use App\Repositories\V1\City\CityRepository;
use App\Repositories\V1\City\CityRepositoryInterface;
use App\Repositories\V1\District\DistrictRepository;
use App\Repositories\V1\District\DistrictRepositoryInterface;
use App\Repositories\V1\Commune\CommuneRepository;
use App\Repositories\V1\Commune\CommuneRepositoryInterface;
use App\Repositories\V1\BloodGroup\BloodGroupRepository;
use App\Repositories\V1\BloodGroup\BloodGroupRepositoryInterface;
use App\Repositories\V1\Information\InformationRepository;
use App\Repositories\V1\Information\InformationRepositoryInterface;
use App\Repositories\V1\RequestBlood\RequestBloodRepository;
use App\Repositories\V1\RequestBlood\RequestBloodRepositoryInterface;
use App\Repositories\V1\BloodBag\BloodBagRepository;
use App\Repositories\V1\BloodBag\BloodBagRepositoryInterface;

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
        $this->app->bind(CityRepositoryInterface::class, CityRepository::class);
        $this->app->bind(DistrictRepositoryInterface::class, DistrictRepository::class);
        $this->app->bind(CommuneRepositoryInterface::class, CommuneRepository::class);
        $this->app->bind(BloodGroupRepositoryInterface::class, BloodGroupRepository::class);
        $this->app->bind(InformationRepositoryInterface::class, InformationRepository::class);
        $this->app->bind(RequestBloodRepositoryInterface::class, RequestBloodRepository::class);
        $this->app->bind(BloodBagRepositoryInterface::class, BloodBagRepository::class);
    }
}
