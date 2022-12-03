<?php

namespace App\UseCases\Thread;

use App\Services\Thread\ThreadService;

class ThreadInteracter
{
    private $thread_service;

    public function __construct(ThreadService $thread_service)
    {
        $this->thread_service = $thread_service;
    }

    public function thread_detail(int $thread_id): array
    {
        $res = $this->thread_service->thread_detail($thread_id);

        return $res;
    }
}
