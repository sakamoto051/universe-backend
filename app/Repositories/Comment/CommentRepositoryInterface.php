<?php

namespace App\Repositories\Comment;

interface CommentRepositoryInterface
{
    public function findByThreadId($thread_id);
    public function storeComment($user_id, $thread_id, $content);
}

