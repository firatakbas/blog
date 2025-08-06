<?php

namespace App\Services;

use App\Repositories\AuthRepository;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    protected $authRepository;

    public function __construct(AuthRepository $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function create(string $name, string $email, string $password)
    {
        $user = $this->authRepository->getByEmail($email);

        if ($user) {
            return false;
        }

        $user = $this->authRepository->create($name, $email, $password);

        return $user;
    }

    public function login(string $email, string $password)
    {
        $user = $this->authRepository->getByEmail($email);

        if (!$user || !Hash::check($password, $user->password)) {
            return false;
        }

        return $user;
    }

    public function logout()
    {
        $user = auth()->user();

        if (!$user) {
            return false;
        }

        $user->currentAccessToken()?->delete();

        return $user;
    }
}
