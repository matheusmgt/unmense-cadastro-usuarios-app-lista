<?php 

namespace App\Services;

use App\DTO\Chat\ChatMessagePostDTO;

use App\Repositories\Chat\ChatRepository;

class ChatService {

    public function __construct(protected ChatRepository $repository) {}

    public function store(ChatMessagePostDTO $dto) : object {
        return $this->repository->store($dto);
    }

    public function get_chat(int $user_send_id, int $user_receive_id) : array {
        return $this->repository->get_chat($user_send_id, $user_receive_id);
    }
}