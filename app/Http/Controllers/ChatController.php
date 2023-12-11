<?php

namespace App\Http\Controllers; 

use App\DTO\Chat\ChatMessagePostDTO;
use App\Services\ChatService;
use App\Http\Requests\Chat\ChatMessagePostRequest;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function __construct(protected ChatService $service) {}

    public function show(Request $request, $user_receive_id) {
        return $this->service->get_chat($request->user()->id, $user_receive_id);
    }
    
    public function store(ChatMessagePostRequest $request)
    {
        return $this->service->store(ChatMessagePostDTO::makeFromRequest($request));
    }

}
