<?php

namespace App\Values\Thread;

use App\Entities\ThreadEntity;

class ThreadOutput
{
    private $id;
    private $user_id;
    private $title;

    public function __construct(
        $id,
        $user_id,
        $title,
    ) {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->title = $title;
    }

    public function toArray()
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'title' => $this->title,
        ];
    }
}
