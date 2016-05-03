<?php

namespace App\Domain\UserRegistration\Provider;

use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use App\Domain\UserRegistration\UserRegistration;
use App\Domain\UserRegistration\UserRegistrationInterface;
use App\Domain\UserRegistration\Repository\UserRepository;
use App\Domain\UserRegistration\Repository\UserRepositoryInterface;

/**
 * Class RegistrationServiceProvider
 */
class RegistrationServiceProvider extends ServiceProvider
{
    /** @var bool */
    protected $defer = true;

    /**
     * register
     */
    public function register()
    {
        $this->app->bind(UserRepositoryInterface::class, function (Application $app) {
            return $app->make(UserRepository::class, [
                    $app->make('Doctrine\ORM\EntityManagerInterface'),
                ]
            );
        });
        $this->app->bind(UserRegistrationInterface::class, UserRegistration::class);
    }

    /**
     * {@inheritdoc}
     */
    public function provides()
    {
        return [
            UserRepositoryInterface::class,
        ];
    }
}
