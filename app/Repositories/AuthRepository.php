<?php

namespace App\Repositories;

use App\Interfaces\AuthRepositoryInterface;
use App\Models\User;

class AuthRepository implements AuthRepositoryInterface
{
    public function create(string $name, string $email, string $username, string $password)
    {
        return User::create([
            'name'     => $name,
            'email'    => $email,
            'username' => $username,
            'password' => $password,
        ]);
    }

    public function login(array $data)
    {
        // TODO: Implement login() method.
    }

    public function getById(int $id)
    {
        // TODO: Implement getById() method.
    }

    public function getByEmail(string $email)
    {
        return User::where('email', $email)->first();
    }

    public function getByUsername(string $username)
    {
        return User::where('username', $username)->first();
    }
}
