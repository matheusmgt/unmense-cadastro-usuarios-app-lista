<?php

namespace App\Repositories\Chat;

use App\DTO\Chat\ChatMessagePostDTO;
use App\Models\Chat;

class ChatRepository
{

    public function __construct(protected Chat $model)
    {
    }

    public function store(ChatMessagePostDTO $dto): object
    {
        return $this->model->create((array) $dto);
    }

    public function get_chat(int $user_send_id, int $user_receive_id): array
    {
        return $this->model::where(function ($query) use ($user_send_id, $user_receive_id) {
                           $query->where('user_receive_id',  '=', $user_send_id)
                                 ->orWhere('user_receive_id','=', $user_receive_id);
                         })->where(function ($query) use ($user_send_id, $user_receive_id) {
                           $query->where('user_send_id',     '=', $user_send_id)
                                 ->orWhere('user_send_id',    '=', $user_receive_id);
               })->with('user_send')->with('user_receive')->orderBy('created_at', 'asc')->get()->toArray();
    }

}