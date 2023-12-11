<?php

namespace App\Repositories\User;

use App\DTO\User\CreateUserDTO;
use App\DTO\User\UpdateUserDTO;
use App\Models\User;
use DB;

class UserRepository
{

    public function __construct(protected User $model)
    {
    }

    public function store(CreateUserDTO $dto): array
    {
        if ($dto->avatar_file['file_name']) {
            $dto->avatar = $this->getDestinationPath($dto->avatar_file['file_name']);
        }

        $data = $this->model->create((array) $dto)->toArray();

        if ($dto->avatar_file['file_name']) {
            $this->saveFile($data['id'], $dto->avatar_file);
        }

        return $data;

    }

    public function update(UpdateUserDTO $dto): bool
    {

        if ($dto->avatar_file['file_name']) {
            $dto->avatar = $this->getDestinationPath($dto->avatar_file['file_name']);
            $this->saveFile($dto->id, $dto->avatar_file);
        }

        if (!isset($dto->passsword))
            unset($dto->password);

        return $this->model->findOrFail($dto->id, 'id')->update((array) $dto);

    }

    public function get(int $id): object
    {
        return $this->model->where('id', $id)->firstOrFail();
    }

    public function getUserByEmail(string $email): User|null
    {
        return $this->model->where('email', $email)->first();
    }

    public function delete(int $id): bool
    {
        return $this->model->where('id', $id)->delete();
    }

    public function getAllUsers(): array
    {
        return $this->model->all()->toArray();
    }

    public function getEmailByUserID(int $user_id): string
    {
        return $this->model->where('id', $user_id)->firstOrFail()->email;
    }

    public function getDestinationPath(string $file_name): string
    {
        return "user/{{id}}/{$file_name}";
    }

    public function saveFile($id, $file)
    {
        $destinationPath = "user/{$id}";
        if (!file_exists($destinationPath))
            mkdir($destinationPath, 0770, true);
        copy($file['file'], public_path("$destinationPath/{$file['file_name']}"));
    }

    public function get_friends(int $user_id): array
    {
        $sql = "
        select usr.id, usr.name, usr.avatar, cht.message from users as usr

        left join chats as cht
        on
        cht.id = (select MAX(id) from chats where (chats.user_send_id = '$user_id' || chats.user_send_id = usr.id) and (chats.user_receive_id  = '$user_id' || chats.user_receive_id = usr.id))
        
        where 
        usr.id <> '$user_id'
        
        order by cht.created_at desc 
        ";

        return DB::select($sql);
    }

}