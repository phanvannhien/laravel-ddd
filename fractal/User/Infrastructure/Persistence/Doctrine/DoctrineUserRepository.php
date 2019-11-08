<?php
declare(strict_types=1);

namespace Fractal\User\Infrastructure\Persistence\Doctrine;

use Doctrine\ORM\EntityRepository;
use Fractal\User\Domain\Model\User\User;
use Fractal\User\Domain\Model\User\UserRepository;
use Illuminate\Support\Facades\Auth;

class DoctrineUserRepository extends EntityRepository implements UserRepository
{
    public function getArticles(User $user)
    {
        dd($user->getArticles()->getValues());
    }



    public function getUser(int $id ): User
    {
        $user = $this->findOneBy(['id' => $id]);

        if (null === $User) {
            throw new \InvalidArgumentException('Invalid user id');
        }

        return $user;
    }

    public function store($data)
    {
        $user = new User(
            $data['name'],
            $data['email'],
            app('hash')->make($data['password'])
        );
        $this->getEntityManager()->persist($user);
        $this->getEntityManager()->flush();
        return $user;
    }

    public function login($data)
    {
        $user = Auth::attempt(['email' => $data['email'], 'password' => $data['password']]);
        return $user;
    }
}
