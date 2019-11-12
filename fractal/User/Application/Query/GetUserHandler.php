<?php
namespace Fractal\User\Application\Query;

use Fractal\User\Domain\Model\User\UserRepository;

use Fractal\User\Application\Query\UserPayload;
use Fractal\User\Application\Query\GetUserQuery;

class GetUserHandler{
    private $userRepository;

    public function __construct(UserRepository $repo){
        $this->userRepository = $repo;
    }

    public function getUser( GetUserQuery $query ): UserPayload
    {

        $user =  $this->userRepository->getUser( $query->getId() );
        return new UserPayload( $user );
        
    }

}