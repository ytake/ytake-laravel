<?php

namespace App\Domain\UserRegistration;

use App\Domain\UserRegistration\Entity\User;
use App\Domain\UserRegistration\Repository\UserRepositoryInterface;

/**
 * Class UserRegistration
 * Domain Service
 */
class UserRegistration implements UserRegistrationInterface
{
    /** @var UserRepositoryInterface */
    protected $userRepository;

    /**
     * RegistrationService constructor.
     *
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param User $user
     *
     * @return int
     */
    public function register(User $user)
    {
        return $this->userRepository->add($user);
    }
}
