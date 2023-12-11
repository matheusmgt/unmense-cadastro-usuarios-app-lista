<?php

namespace App\Http\Controllers; 

use App\DTO\User\UserLoginDTO;
use App\Services\UserLoginService;
use App\Http\Requests\User\UserLoginRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct(protected UserLoginService $service) {}

    public function login(UserLoginRequest $request)
    {
        return $this->service->login(UserLoginDTO::makeFromRequest($request));
    }

    public function logout(Request $request) {
        $request->user()->currentAccessToken()->delete();
    }

}
