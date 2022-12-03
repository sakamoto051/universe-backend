<?php

namespace App\Services\Thread;
use App\Repositories\Thread\ThreadRepositoryInterface;

class ThreadService
{
    private ThreadRepositoryInterface $thread_repository;

    public function __construct(ThreadRepositoryInterface $thread_repository)
    {
        $this->thread_repository = $thread_repository;
    }

    public function thread_detail(int $thread_id): array
    {
        $thread = $this->thread_repository->thread_detail($thread_id);

        return $thread;
    }
}
