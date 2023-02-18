<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\UseCases\Comment\CommentInteracter;
use App\Values\Comment\StoreCommentInput;

class CommentController extends Controller
{
    private CommentInteracter $comment_interacter;

    public function __construct(CommentInteracter $comment_interacter)
    {
        $this->comment_interacter = $comment_interacter;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreCommentRequest $request
     * @return void
     */
    public function store(StoreCommentRequest $request): void
    {
        $user_id = $request->user_id;
        $thread_id = $request->thread_id;
        $content = $request->content;

        $input = new StoreCommentInput(
            $user_id,
            $thread_id,
            $content,
        );

        $res = $this->comment_interacter->store($input);
    }
}
