<?php
declare(strict_types=1);

namespace Fractal\User\Infrastructure\Http\Controller;

use Fractal\Share\Http\DomainController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Fractal\Share\Application\CommandBus;
use Fractal\User\Application\Command\User\RegisterUserCommand;
use Fractal\User\Infrastructure\Http\Requests\CreateUserRequest;

use Fractal\User\Application\Query\GetUserQuery;
use Fractal\User\Application\Query\GetUserHandler;

use Serializer;

class UserController extends DomainController{

    public function getArticles( UserRepository $repo )
    {
        $user = Auth::user();
    }

    public function getUser( GetUserHandler $getUserHandle, $id )
    {
        $query = new GetUserQuery( (int)$id );
        $userPayload = $getUserHandle->getUser( $query );
        $userCollection = $userPayload->getUserCollection();

        return response()->json( json_decode(Serializer::serialize($userCollection)) );
    }

    public function createUser(CommandBus $commandBus, CreateUserRequest $request) {
        $command = new RegisterUserCommand( $request->get('email'), $request->get('password'), $request->get('name') );
        $user = $commandBus->handle( $command );
        return response()->json( $user );
    }


}