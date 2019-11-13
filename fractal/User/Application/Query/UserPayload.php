<?php
namespace Fractal\User\Application\Query;
use Illuminate\Support\Collection;
use Fractal\User\Domain\Model\User\User;

class UserPayload {
    private $user;

    public function __construct( User $user ){
        $this->user = $user;
    }

    public function getUser(){
        return $this->user;
    }

    public function getUserCollection(): User
    {  
        $user = $this->getUser();
        return $user;
        //return new Collection($user->jsonSerialize());
    }
}