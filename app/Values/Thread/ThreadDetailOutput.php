<?php

namespace App\Values\Thread;

class ThreadDetailOutput
{
    private int $thread_id;
    private int $user_id;
    private string $title;
    private string $content;
    private array $comments;

    public function __construct(
        int $thread_id,
        int $user_id,
        string $title,
        string $content,
        array $comments,
    )
    {
        $this->thread_id = $thread_id;
        $this->user_id = $user_id;
        $this->title = $title;
        $this->content = $content;
        $this->comments = $comments;
    }

    public function toArray()
    {
        return [
            'thread_id' => $this->thread_id,
            'user_id' => $this->user_id,
            'title' => $this->title,
            'content' => $this->content,
            'comments' => $this->comments,
        ];
    }
}
