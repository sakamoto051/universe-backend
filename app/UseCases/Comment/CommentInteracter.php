<?php

namespace App\UseCases\Comment;

use App\Services\Comment\CommentService;
use App\Values\Comment\StoreCommentInput;

class CommentInteracter
{
    private $comment_service;

    public function __construct(
        CommentService $comment_service,
    ) {
        $this->comment_service = $comment_service;
    }

    public function store(StoreCommentInput $input)
    {
        $comment = $this->comment_service->store($input);
        return $comment;
    }

}
