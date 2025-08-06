<?php

namespace App\Interfaces;

interface AuthRepositoryInterface
{
    public function create(string $name, string $email, string $password);

    public function login(array $data);

    public function getById(int $id);

    public function getByEmail(string $email);
}
