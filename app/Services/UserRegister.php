<?php

namespace App\Services;

use Illuminate\Contracts\Mail\Mailer;
use App\Domain\UserRegistration\Entity\User;
use App\Domain\UserRegistration\UserRegistrationInterface;
use Ytake\LaravelAspect\Annotation\Loggable;
use Ytake\LaravelAspect\Annotation\Transactional;

/**
 * Class UserRegister
 */
class UserRegister
{
    /** @var UserRegistrationInterface */
    protected $domain;

    /** @var Mailer  */
    protected $mailer;

    /**
     * UserRegister constructor.
     *
     * @param UserRegistrationInterface $domain
     * @param Mailer                    $mailer
     */
    public function __construct(UserRegistrationInterface $domain, Mailer $mailer)
    {
        $this->domain = $domain;
        $this->mailer = $mailer;
    }

    /**
     * @Loggable(skipResult=true)
     * @Transactional
     *
     * @param string $name
     * @param string $email
     * @return void
     */
    public function register($name, $email)
    {
        if ($this->domain->register(new User($name, $email))) {
            $this->mailer->send('mail.template', [], function () {
                // for mail
            });
        }
    }
}
