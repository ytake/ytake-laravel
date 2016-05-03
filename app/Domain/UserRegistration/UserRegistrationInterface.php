<?php

namespace App\Domain\UserRegistration;

use App\Domain\UserRegistration\Entity\User;

/**
 * Interface UserRegistrationInterface
 */
interface UserRegistrationInterface
{

    /**
     * @param User $user
     *
     * @return int
     */
    public function register(User $user);
}
