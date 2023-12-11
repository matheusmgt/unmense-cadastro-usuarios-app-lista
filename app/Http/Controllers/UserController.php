<?php

namespace App\Http\Controllers; 

use App\DTO\User\CreateUserDTO;
use App\DTO\User\UpdateUserDTO;
use App\Services\UserService;


use Illuminate\Http\Request;
use App\Http\Requests\User\UserPostRequest;
use App\Http\Requests\User\UserUpdateRequest;

class UserController extends Controller
{
    public function __construct(protected UserService $service) {}

    public function index()
    {
        return $this->service->getAllUsers();
    }
    public function store(UserPostRequest $request)
    {
        return $this->service->store(CreateUserDTO::makeFromRequest($request));
    }

    public function friend_list(Request $request) {
        return $this->service->get_friends($request->user()->id);
    }

    public function update(UserUpdateRequest $request) {
        return $this->service->update(UpdateUserDTO::makeFromRequest($request));
    }

    public function show($id)
    {
        return $this->service->get($id);
    }

    public function destroy($id)
    {
        return $this->service->destroy($id);
    }

    public function get_user_logged(Request $request) {
        return $request->user();
    }

}
