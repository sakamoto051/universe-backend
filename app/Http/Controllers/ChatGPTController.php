<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChatGPTRequest;
use App\UseCases\ChatGPT\ChatGPTInteracter;

class ChatGPTController extends Controller
{
    private ChatGPTInteracter $chatgpt_interacter;
    public function __construct(
        ChatGPTInteracter $chatgpt_interacter
    )
    {
        $this->chatgpt_interacter = $chatgpt_interacter;
    }
    public function chat(ChatGPTRequest $request): string
    {
        $res = $this->chatgpt_interacter->chat($request['content']);
        return $res;
    }
}
