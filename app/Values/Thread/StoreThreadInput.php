<?php

namespace App\Values\Thread;

class StoreThreadInput
{
    public int $user_id;
    public string $title;
    public string $content;

    public function __construct(
        int $user_id,
        string $title,
        string $content,
    ) {
        $this->user_id = $user_id;
        $this->title = $title;
        $this->content = $content;
    }
}
