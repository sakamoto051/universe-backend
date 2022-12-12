<?php

namespace App\Repositories\Comment;

interface CommentRepositoryInterface
{
    public function findByThreadId($thread_id);
}

