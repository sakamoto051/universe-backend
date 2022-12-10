<?php

namespace App\Services\Thread;

use App\Repositories\Thread\ThreadRepositoryInterface;
use App\Values\Thread\ThreadDetailOutput;

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

    public function fetch($id)
    {
        $thread = $this->thread_repository->findById($id);
        return $thread;
    }

    public function thread_detail($thread_id)
    {
        return $this->thread_repository->thread_detail($thread_id));
    }
}
