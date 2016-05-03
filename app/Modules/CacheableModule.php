<?php

namespace App\Modules;

use Ytake\LaravelAspect\Modules\CacheableModule as PackageCacheableModule;

/**
 * Class CacheableModule
 */
class CacheableModule extends PackageCacheableModule
{
    /** @var array */
    protected $classes = [
        'App\Domain\UserRegistration\Repository\UserRepository',
    ];
}
