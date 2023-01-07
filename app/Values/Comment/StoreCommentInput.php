<?php

namespace App\Values\Comment;

class StoreCommentInput
{
    public $user_id;
    public $thread_id;
    public $content;

    public function __construct(
        $user_id,
        $thread_id,
        $content,
    ) {
        $this->user_id    = $user_id;
        $this->thread_id  = $thread_id;
        $this->content    = $content;
    }

    public function toArray()
    {
        return [
            'user_id'    => $this->user_id,
            'thread_id'  => $this->thread_id,
            'content'    => $this->content,
        ];
    }
}
