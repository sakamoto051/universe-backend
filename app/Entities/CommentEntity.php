<?php

namespace App\Entities;

class CommentEntity extends Entity {
    protected int $id;
    protected int $user_id;
    protected int $thread_id;
    protected int $comment_no;
    protected string $content;
    protected string $created_at;

    /**
     * Summary of __construct
     * @param int $id
     * @param int $user_id
     * @param int $thread_id
     * @param int $comment_no
     * @param string $content
     * @param string $created_at
     */
    public function __construct(
        $id,
        $user_id,
        $thread_id,
        $comment_no,
        $content,
        $created_at
    ) {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->thread_id = $thread_id;
        $this->comment_no = $comment_no;
        $this->content = $content;
        $this->created_at = $created_at;
    }
}
