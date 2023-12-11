<?php

namespace App\DTO\Chat;

use App\Http\Requests\Chat\ChatMessagePostRequest;

class ChatMessagePostDTO {

    public function __construct(public string $message, public string $user_send_id, public string $user_receive_id) {}

    public static function makeFromRequest(ChatMessagePostRequest $request) {
        return new self(
            $request->message,
            $request->user()->id,
            $request->user_receive_id
        );
    }

}