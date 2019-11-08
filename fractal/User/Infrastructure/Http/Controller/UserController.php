<?php
declare(strict_types=1);

namespace Fractal\User\Infrastructure\Http\Controller;

use Fractal\Share\Http\DomainController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Fractal\User\Domain\Model\User\UserRepository;

class UserController extends DomainController{
    public function getArticles( UserRepository $repo ){
        $user = Auth::user();
        dd( $repo->getArticles($user) );
    }
    public function getUser(  UserRepository $repo , $id ){
       
        dd( $repo->getUser( (int)$id ) );
    }

    public function createUser(UserRepository $repo, Request $request) {
        $data = $request->all();
        $user = $repo->store($data);
        dd($user);
    }

    public function login(UserRepository $repo, Request $request) {
        $data = $request->all();
        $user = $repo->login($data);
        dd($user);
    }

}