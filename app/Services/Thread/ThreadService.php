<?php

namespace App\Services\Thread;

use App\Entities\ThreadEntity;
use App\Repositories\Thread\ThreadRepositoryInterface;
use App\Values\Thread\StoreThreadInput;

class ThreadService
{
    private ThreadRepositoryInterface $thread_repository;

    public function __construct(ThreadRepositoryInterface $thread_repository)
    {
        $this->thread_repository = $thread_repository;
    }

    /**
     * Summary of index
     * @return array
     */
    public function index(): array
    {
        $res = $this->thread_repository->index();
        return $res;
    }

    /**
     * Summary of store
     * @param StoreThreadInput $request
     * @return void
     */
    public function store(StoreThreadInput $input): void
    {
        $this->thread_repository->store($input);
    }

    /**
     * Summary of findById
     * @param int $thread_id
     * @return ThreadEntity
     */
    public function findById(int $thread_id): ThreadEntity
    {
        $thread = $this->thread_repository->findById($thread_id);
        return $thread;
    }

    /**
     * Summary of myThread
     * @param int $user_id
     * @return array
     */
    public function myThread(int $user_id): array
    {
        $threads = $this->thread_repository->myThread($user_id);
        return $threads;
    }
}
