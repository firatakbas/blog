<?php

namespace App\Interfaces;

interface AuthRepositoryInterface
{
    public function create(string $name, string $email, string $username, string $password);

    public function login(array $data);

    public function getById(int $id);

    public function getByEmail(string $email);

    public function getByUsername(string $username);
}
