<?php

namespace App\Modules;

use App\Aspect\PointCut\ValidPointCut;
use Ytake\LaravelAspect\Modules\AspectModule;

/**
 * Class ValidModule
 */
class ValidModule extends AspectModule
{
    /** @var array */
    protected $classes = [
        'App\Http\Controllers\User\RegistrationController',
    ];

    /**
     * @return \Ytake\LaravelAspect\PointCut\PointCutable
     */
    protected function registerPointCut()
    {
        return new ValidPointCut;
    }
}
