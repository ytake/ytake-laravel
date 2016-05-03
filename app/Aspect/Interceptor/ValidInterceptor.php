<?php

namespace App\Aspect\Interceptor;

use Ray\Aop\MethodInvocation;
use Ray\Aop\MethodInterceptor;
use Ytake\LaravelAspect\Annotation\AnnotationReaderTrait;

/**
 * Class ValidInterceptor
 */
class ValidInterceptor implements MethodInterceptor
{
    use AnnotationReaderTrait;

    /**
     * @param \Ray\Aop\MethodInvocation $invocation
     *
     * @return object
     */
    public function invoke(MethodInvocation $invocation)
    {
        /** @var \App\Annotation\Valid $annotation */
        $annotation = $this->reader
            ->getMethodAnnotation($invocation->getMethod(), $this->annotation);
        if ($annotation->request) {
            if ((new \ReflectionClass($annotation->request))->isInstantiable()) {
                app($annotation->request);
            }
        }

        return $invocation->proceed();
    }
}
