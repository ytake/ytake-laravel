<?php

namespace App\Providers;

use Collective\Annotations\AnnotationsServiceProvider as ServiceProvider;

/**
 * Class AnnotationServiceProvider
 */
class AnnotationServiceProvider extends ServiceProvider
{
    /** @var string[] */
    protected $scanEvents = [];

    /** @var string[] */
    protected $scanRoutes = [
        'App\Http\Controllers\IndexController',
        'App\Http\Controllers\User\RegistrationController',
    ];
}
