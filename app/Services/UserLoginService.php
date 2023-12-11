<?php

namespace App\Services;

use App\DTO\User\UserLoginDTO;
use App\Repositories\User\UserRepository;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;

class UserLoginService {

    public function __construct(protected UserRepository $repository) {
    }

    public function login(UserLoginDTO $dto): string {
        $user = $this->repository->getUserByEmail($dto->email);

        if(!$user || !Hash::check($dto->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        return $user->createToken(env('APP_TOKEN', 'APP_TEST'))->plainTextToken;
    }

}