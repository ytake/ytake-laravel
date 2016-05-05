<?php

namespace App\Domain\UserRegistration\Repository;

use Doctrine\ORM\EntityManagerInterface;
use App\Domain\UserRegistration\Entity\User;
use Ytake\LaravelAspect\Annotation\Cacheable;

/**
 * Class UserRepository
 */
class UserRepository implements UserRepositoryInterface
{
    /** @var EntityManagerInterface */
    protected $entityManager;

    /**
     * UserRepository constructor.
     *
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @param array $criteria
     *
     * @return mixed
     */
    public function findByParameters(array $criteria)
    {
        return $this->entityManager->getRepository(User::class)
            ->findOneBy($criteria);
    }

    /**
     * @Cacheable(cacheName="user:find",key={"#userId"})
     * @param int $userId
     *
     * @return mixed
     */
    public function find($userId)
    {
        return $this->entityManager->find(User::class, $userId);
    }

    /**
     * @param User $user
     *
     * @return int
     */
    public function add(User $user)
    {
        $this->entityManager->persist($user);
        $this->entityManager->flush();

        return $user->getId();
    }

    /**
     * @param User $user
     */
    public function update(User $user)
    {
        $this->entityManager->persist($user);
        $this->entityManager->flush();
    }
}
