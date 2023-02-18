<?php

namespace App\Services\Comment;

use App\Repositories\Comment\CommentRepositoryInterface;
use App\Values\Comment\CommentOutput;
use App\Values\Comment\StoreCommentInput;

class CommentService
{
    private CommentRepositoryInterface $comment_repository;

    public function __construct(CommentRepositoryInterface $comment_repository)
    {
        $this->comment_repository = $comment_repository;
    }

    /**
     * Summary of findByThreadId
     * @param int $thread_id
     * @return array
     */
    public function findByThreadId(int $thread_id): array
    {
        $comments = $this->comment_repository->findByThreadId($thread_id);
        return $comments;
    }

    /**
     * Summary of store
     * @param StoreCommentInput $input
     * @return CommentOutput
     */
    public function store(StoreCommentInput $input): CommentOutput
    {
        $user_id = $input->user_id;
        $thread_id = $input->thread_id;
        $content = $input->content;
        $comment = $this->comment_repository->storeComment($user_id, $thread_id, $content);
        return new CommentOutput(
            $comment->id,
            $comment->user_id,
            $comment->thread_id,
            $comment->comment_no,
            $comment->content,
            $comment->created_at,
        );
    }
}
