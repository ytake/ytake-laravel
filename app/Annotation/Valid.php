<?php

namespace App\Annotation;

use Doctrine\Common\Annotations\Annotation;

/**
 * @Annotation
 * @Target("METHOD")
 * Class Valid
 */
final class Valid extends Annotation
{
    /** @var string */
    public $request;
}
