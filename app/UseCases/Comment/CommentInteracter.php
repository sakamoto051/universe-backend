<?php

namespace App\UseCases\Comment;

use App\Services\Comment\CommentService;
use App\Values\Comment\StoreCommentInput;

class CommentInteracter
{
    private CommentService $comment_service;

    public function __construct(
        CommentService $comment_service,
    ) {
        $this->comment_service = $comment_service;
    }

    /**
     * Summary of store
     * @param StoreCommentInput $input
     * @return array
     */
    public function store(StoreCommentInput $input): array
    {
        $comment = $this->comment_service->store($input);
        return $comment->toArray();
    }
}
