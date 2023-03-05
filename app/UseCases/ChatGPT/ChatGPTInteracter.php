<?php

namespace App\UseCases\ChatGPT;

use App\Services\ChatGPT\ChatGPTService;

class ChatGPTInteracter
{
    private ChatGPTService $chatgpt_service;

    public function __construct(
        ChatGPTService $chatgpt_service,
    ) {
        $this->chatgpt_service = $chatgpt_service;
    }

    /**
     * chat
     * @param $content
     * @return string
     */
    public function chat(string $content): string
    {
        $res = $this->chatgpt_service->chat($content);
        return $res;
    }
}
