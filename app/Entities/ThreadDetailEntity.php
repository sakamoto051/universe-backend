<?php

namespace App\Entities;

use App\Entities\Entity;

class ThreadDetailEntity extends Entity
{
    /**
     * Undocumented variable
     *
     * @var int $id
     */
    protected int $thread_id;
    /**
     * Summary of user_id
     * @var int
     */
    protected int $user_id;
    /**
     * Summary of title
     * @var string
     */
    protected string $title;

    protected string $content;
    /**
     * Summary of content
     * @var string
     */
    protected array $comments;

    public function __construct(
        int $thread_id,
        int $user_id,
        string $title,
        string $content,
        array $comments,
    ) {
        $this->thread_id = $thread_id;
        $this->user_id = $user_id;
        $this->title = $title;
        $this->content = $content;
        $this->comments = $comments;
    }
}
