<?php

namespace App\Services\Comment;
use App\Repositories\Comment\CommentRepositoryInterface;

class CommentService
{
    private CommentRepositoryInterface $comment_repository;

    public function __construct(CommentRepositoryInterface $comment_repository)
    {
        $this->comment_repository = $comment_repository;
    }

    public function findByThreadId($thread_id)
    {
        $comments = $this->comment_repository->findByThreadId($thread_id);
        return $comments;
    }
}
