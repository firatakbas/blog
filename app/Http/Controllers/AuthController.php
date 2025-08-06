<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginUserRequest;
use App\Http\Requests\Auth\RegisterUserRequest;
use App\Http\Resources\UserResource;
use App\Services\AuthService;

class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function store(RegisterUserRequest $request)
    {
        $user = $this->authService->create($request->name, $request->email, $request->password);

        if (!$user) {
            return response()->json([
                'errors' => 'Bu e-posta kayıtlı',
            ], 422);
        }

        return response()->json([
            'message' => 'Kullanıcı kayıt oldu',
            'user'    => new UserResource($user),
        ], 201);
    }

    public function login(LoginUserRequest $request)
    {
        $user = $this->authService->login($request->email, $request->password);

        if (!$user) {
            return response()->json([
                'error' => 'E-posta veya şifre bilgisi yanlış',
            ], 422);
        }

        $token = $user->createToken($user->email)->plainTextToken;

        return response()->json([
            'token' => $token,
            'user'  => new UserResource($user),
        ]);
    }

    public function logout()
    {
        $user = $this->authService->logout();

        if (!$user) {
            return response()->json([
                'error' => 'Kullanıcı bulunamadı veya zaten çıkış yapılmış',
            ], 401);
        }

        return response()->json([
            'message' => 'Başarılı bir şekide çıkış yapıldı',
        ], 200);

    }
}
