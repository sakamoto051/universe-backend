<?php

namespace App\Entities;

use App\Entities\Entity;

class ThreadEntity extends Entity
{
    /**
     * Undocumented variable
     *
     * @var int $id
     */
    protected int $id;
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

    /**
     * Summary of __construct
     * @param int $id
     * @param int $user_id
     * @param string $title
     */
    public function __construct(
        int $id,
        int $user_id,
        string $title,
    ) {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->title = $title;
    }
}
