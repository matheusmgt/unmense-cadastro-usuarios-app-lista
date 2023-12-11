<?php

namespace App\DTO\User;

use App\Http\Requests\User\UserLoginRequest;

class UserLoginDTO {

    public function __construct(public string $email, public string $password) {}

    public static function makeFromRequest(UserLoginRequest $request) {
        return new self(
            $request->email,
            $request->password
        );
    }

}