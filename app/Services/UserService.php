<?php 

namespace App\Services;

use App\DTO\User\CreateUserDTO;
use App\DTO\User\UpdateUserDTO;
use App\Repositories\User\UserRepository;
use Illuminate\Http\Response;

class UserService {

    public function __construct(protected UserRepository $repository) {}
   
    public function store(CreateUserDTO $dto) : array | Response {

        if($this->repository->getUserByEmail($dto->email)) {
            return response(['error'=>'Atenção! Este email já foi cadastrado.']);
        }

        return $this->repository->store($dto);
    }

    public function update(UpdateUserDTO $dto) : bool | Response {

        if($this->repository->getUserByEmail($dto->email) && 
           $this->repository->getEmailByUserID($dto->id) != $dto->email) {
            return response(['error'=>'Atenção! Este email já foi cadastrado.']);
        }

        return $this->repository->update($dto);
    }


    public function destroy($id) : bool {
        return $this->repository->delete($id);
    }

    public function get($id) : object {
        return $this->repository->get($id);
    }

    public function getAllUsers() : array {
        return $this->repository->getAllUsers();
    }

    public function get_friends(int $user_id) : array { 
        return $this->repository->get_friends($user_id);
    }
 
}