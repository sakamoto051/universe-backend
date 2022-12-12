<?php

namespace App\Values\Comment;

class CommentOutput
{
    private $id;
    private $user_id;
    private $thread_id;
    private $content;

    public function __construct(
        $id,
        $user_id,
        $thread_id,
        $content
    ) {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->thread_id = $thread_id;
        $this->content = $content;
    }

    public function toArray()
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'thread_id' => $this->thread_id,
            'content' => $this->content,
        ];
    }
}
