<?php
declare (strict_types = 1);

namespace App\Domain\UserRegistration\Repository;

use App\Domain\UserRegistration\Entity\User;

/**
 * Class UserRepository
 */
interface UserRepositoryInterface
{
    /**
     * @param string $mail
     *
     * @return mixed
     */
    public function findByMail(string $mail);

    /**
     * @param array $attributes
     *
     * @return mixed
     */
    public function findByParameters(array $attributes);

    /**
     * @param User $user
     *
     * @return int
     */
    public function add(User $user);

    /**
     * @param int $userId
     *
     * @return mixed
     */
    public function find(int $userId);

    /**
     * @param User $user
     */
    public function update(User $user);
}