<?php

namespace App\Aspect\PointCut;

use App\Annotation\Valid;
use App\Aspect\Interceptor\ValidInterceptor;
use Illuminate\Contracts\Container\Container;
use Ytake\LaravelAspect\PointCut\CommonPointCut;
use Ytake\LaravelAspect\PointCut\PointCutable;

/**
 * Class ValidPointCut
 */
class ValidPointCut extends CommonPointCut implements PointCutable
{
    /** @var string */
    protected $annotation = Valid::class;

    /**
     * @param \Illuminate\Contracts\Container\Container $app
     *
     * @return \Ray\Aop\Pointcut
     */
    public function configure(Container $app)
    {
        $this->setInterceptor(new ValidInterceptor);
        return $this->withAnnotatedAnyInterceptor($app);
    }
}
