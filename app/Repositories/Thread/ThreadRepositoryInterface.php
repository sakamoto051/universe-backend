<?php

namespace App\Repositories\Thread;

use App\Entities\ThreadEntity;
use ThreadDetailOutput;

interface ThreadRepositoryInterface
{

    public function index();

    public function store($request);

    public function findById($id);

    public function thread_detail($thread_id);

}

