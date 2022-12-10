<?php

namespace App\UseCases\Thread;

use App\Entities\ThreadEntity;
use App\Services\Thread\ThreadService;
use ThreadDetailOutput;

class ThreadInteracter
{
    private $thread_service;

    public function __construct(ThreadService $thread_service)
    {
        $this->thread_service = $thread_service;
    }


    public function index()
    {
        $res = $this->thread_service->index();
        return $res;
    }

    public function store($request)
    {
        $this->thread_service->store($request);
    }

    public function fetch($id)
    {
        $thread = $this->thread_service->fetch($id);
        return $thread;
    }

    public function thread_detail($thread_id)
    {
        $res = $this->thread_service->thread_detail($thread_id);
        return $res;
    }
}
