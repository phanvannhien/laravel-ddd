<?php
declare(strict_types=1);

namespace Fractal\User\Application\Command\User;

class RegisterUserCommand
{
    private $email;
    private $password;
    private $name;

    public function __construct(string $email, string $password, string $name )
    {
        $this->email = $email;
        $this->password = $password;
        $this->name = $name;
    }

    public function email(): string
    {
        return $this->email;
    }

    public function password(): string
    {
        return $this->password;
    }

    public function name(): string
    {
        return $this->name;
    }
}
