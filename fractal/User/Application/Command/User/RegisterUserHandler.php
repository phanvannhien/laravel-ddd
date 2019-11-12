<?php
declare(strict_types=1);

namespace Fractal\User\Application\Command\User;

use Fractal\User\Domain\Model\User\User;
use Fractal\User\Domain\Model\User\UserId;

class RegisterUserHandler extends UserHandler
{
    public function handle(RegisterUserCommand $command)
    {
        $user = new User(
            $command->email(),
            bcrypt($command->password()),
            $command->name()
        );

        $this->userRepository->store($user);
    }
}
