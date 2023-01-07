<?php

namespace App\Services\Comment;

use App\Repositories\Comment\CommentRepositoryInterface;
use App\Values\Comment\StoreCommentInput;

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

    public function store(StoreCommentInput $input)
    {
        $user_id = $input->user_id;
        $thread_id = $input->thread_id;
        $content = $input->content;
        $comment = $this->comment_repository->storeComment($user_id, $thread_id, $content);

        return $comment;
    }
}
