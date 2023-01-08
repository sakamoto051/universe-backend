<?php

namespace App\Repositories\Thread;

interface ThreadRepositoryInterface
{

    public function index();

    public function store($request);

    public function findById($id);

    public function myThread($user_id);
}

