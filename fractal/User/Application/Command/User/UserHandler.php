<?php
declare(strict_types=1);

namespace Fractal\User\Application\Command\User;

use Fractal\User\Domain\Model\User\UserRepository;

abstract class UserHandler
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
}
