<?php

namespace App\Values\Thread;

class ThreadDetailOutput
{
    private array $thread;
    private array $comments;

    public function __construct(
        array $thread,
        array $comments,
    )
    {
        $this->thread = $thread;
        $this->comments = $comments;
    }

    public function toArray()
    {
        return [
            'thread' => $this->thread,
            'comments' => $this->comments,
        ];
    }
}
