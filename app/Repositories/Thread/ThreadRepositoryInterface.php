<?php

namespace App\Repositories\Thread;

use App\Entities\ThreadEntity;
use App\Values\Thread\StoreThreadInput;

interface ThreadRepositoryInterface
{
    /**
     * Summary of index
     * @return array
     */
    public function index(): array;

    /**
     * Summary of store
     * @param StoreThreadInput $request
     * @return void
     */
    public function store(StoreThreadInput $request): void;

    /**
     * Summary of findById
     * @param int $thread_id
     * @return ThreadEntity
     */
    public function findById(int $thread_id): ThreadEntity;

    /**
     * Summary of myThread
     * @param int $user_id
     * @return array
     */
    public function myThread(int $user_id): array;
}

