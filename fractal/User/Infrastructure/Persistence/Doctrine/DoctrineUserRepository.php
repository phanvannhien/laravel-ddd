<?php
declare(strict_types=1);

namespace Fractal\User\Infrastructure\Persistence\Doctrine;

use Doctrine\ORM\EntityRepository;
use Fractal\Share\Infrastructure\Persistence\DoctrineRepository;
use Fractal\User\Domain\Model\User\User;
use Fractal\User\Domain\Model\User\UserRepository;
use Illuminate\Support\Facades\Auth;

class DoctrineUserRepository extends DoctrineRepository implements UserRepository
{
    public function getArticles(User $user)
    {
        return $user->getArticles()->getValues();
    }

    public function getUser(int $id ): User
    {
        $user = $this->findOneBy(['id' => $id]);
        $userRaay = $this->processEntity( $user );
        if (null === $user) {
            throw new \InvalidArgumentException('Invalid user id');
        }
        return $user;
    }

    public function store(User $user)
    {
        $this->getEntityManager()->persist($user);
    }

    public function remove(User $user)
    {
        $this->getEntityManager()->remove($user);
    }


}
