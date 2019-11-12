<?php
namespace Fractal\User\Domain\Model\User;

interface UserRepository{
    public function getUser(int $id);
    public function getArticles(User $user);
    public function store(User $user);
    public function remove(User $user);

}