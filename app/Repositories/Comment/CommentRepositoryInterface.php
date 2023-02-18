<?php

namespace App\Repositories\Comment;

use App\Entities\CommentEntity;

interface CommentRepositoryInterface
{
    /**
     * Summary of findByThreadId
     * @param int $thread_id
     * @return array
     */
    public function findByThreadId(int $thread_id): array;

    /**
     * Summary of storeComment
     * @param int $user_id
     * @param int $thread_id
     * @param string $content
     * @return CommentEntity
     */
    public function storeComment(int $user_id, int $thread_id, string $content): CommentEntity;
}

