<?php

namespace App\Services;

use App\Repositories\AuthRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthService
{
    protected $authRepository;

    public function __construct(AuthRepository $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function create(string $name, string $email, string $username, string $password)
    {
        if ($this->authRepository->getByEmail($email)) {
            throw ValidationException::withMessages([
                'email' => ['Bu e-posta kayıtlı'],
            ]);
        }

        if ($this->authRepository->getByUsername($username)) {
            throw ValidationException::withMessages([
                'username' => ['Kullanıcı adı alınmış'],
            ]);
        }

        return $this->authRepository->create($name, $email, $username, $password);
    }

    public function login(string $email, string $password)
    {
        $user = $this->authRepository->getByEmail($email);

        if (!$user || !Hash::check($password, $user->password)) {
            throw ValidationException::withMessages([
                'error' => 'E-posta veya şifre bilgisi yanlış',
            ]);
        }

        return $user;
    }

    public function logout()
    {
        $user = auth()->user();

        if (!$user) {
            throw ValidationException::withMessages([
                'error' => 'Kullanıcı bulunamadı veya zaten çıkış yapılmış',
            ]);
        }

        $user->currentAccessToken()?->delete();

        return $user;
    }
}
