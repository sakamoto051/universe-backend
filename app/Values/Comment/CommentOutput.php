<?php

namespace App\Values\Comment;

class CommentOutput
{
    private $id;
    private $user_id;
    private $thread_id;
    private $comment_no;
    private $content;
    private $created_at;

    public function __construct(
        $id,
        $user_id,
        $thread_id,
        $comment_no,
        $content,
        $created_at,
    ) {
        $this->id         = $id;
        $this->user_id    = $user_id;
        $this->thread_id  = $thread_id;
        $this->comment_no = $comment_no;
        $this->content    = $content;
        $this->created_at = $created_at;
    }

    public function toArray()
    {
        return [
            'id'         => $this->id,
            'user_id'    => $this->user_id,
            'thread_id'  => $this->thread_id,
            'comment_no' => $this->comment_no,
            'content'    => $this->content,
            'created_at' => $this->created_at,
        ];
    }
}
