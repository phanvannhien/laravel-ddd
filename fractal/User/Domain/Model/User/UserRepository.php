<?php
namespace Fractal\User\Domain\Model\User;

interface UserRepository{
    public function getUser(int $id);
    public function getArticles(User $user);
    public function store($data);
    public function login($data);
}