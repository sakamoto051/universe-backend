<?php

namespace App\Repositories\Thread;
use App\Models\Thread;
use Psy\Readline\Hoa\Exception;

class ThreadRepository implements ThreadRepositoryInterface
{

    public function thread_detail(int $thread_id)
    {
        try {
            $thread = Thread::with('comments')->get();
            return $thread;
        } catch (error) {
            throw new Exception('Failed thread_detail()');
        }
    }
}

