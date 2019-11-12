<?php
namespace Fractal\User\Application\Query;
use Fractal\User\Application\Query\UserQuery;

class GetUserQuery{

    private $id;
    private $email;
    private $name;

    public function __construct( int $id, string $email = '', string $name = '' ){
        $this->id = $id;
        $this->email = $email;
        $this->name = $name;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getName( ) : string
    {
        return $this->name;
    }

}