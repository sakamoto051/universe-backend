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

    public function index()
    {
        $res = $this->thread_repository->index();
        return $res;
    }

    public function store($request)
    {
        $this->thread_repository->store($request);
    }

    public function findById($thread_id)
    {
        $thread = $this->thread_repository->findById($thread_id);
        return $thread;
    }
}
