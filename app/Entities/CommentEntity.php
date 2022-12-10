<?php

namespace App\Entities;

class CommentEntity extends Entity {
    protected int $id;
    protected int $user_id;
    protected int $thread_id;
    protected string $content;

    /**
     * Summary of __construct
     * @param int $id
     * @param int $user_id
     * @param int $thread_id
     * @param string $content
     */
    public function __construct($id, $user_id, $thread_id, $content)
    {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->thread_id = $thread_id;
        $this->content = $content;
    }
}
