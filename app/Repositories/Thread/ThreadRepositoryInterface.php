<?php

namespace App\Repositories\Thread;

interface ThreadRepositoryInterface
{
    /**
     * Summary of thread_detail
     * @param int $thread_id
     * @return array
     */
    public function thread_detail(int $thread_id): array;

}

