<?php

namespace App\Http\Controllers;

use App\Entities\ThreadEntity;
use App\Http\Requests\FetchIdRequest;
use App\Http\Requests\StoreThreadRequest;
use App\Models\Thread;
use App\UseCases\Thread\ThreadInteracter;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Contracts\Routing\ResponseFactory;

class ThreadController extends Controller
{
    private ThreadInteracter $thread_interacter;

    public function __construct(ThreadInteracter $thread_interacter)
    {
        $this->thread_interacter = $thread_interacter;
    }

    /**
     * Index of Thread list.
     *
     * @return array $theads
     */
    public function index(): array
    {
        $threads = $this->thread_interacter->index();
        return $threads;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreThreadRequest  $request
     * @return ResponseFactory|Response
     */
    public function store(StoreThreadRequest $request): ResponseFactory|Response
    {
        $this->thread_interacter->store($request);
        return response('Success to store thread.', 200)->header('Content-Type', 'text/plain');
    }

    /**
     * thread_detail
     * @param int $thread_id
     * @return array
     */
    public function thread_detail(int $thread_id): array
    {
        $res = $this->thread_interacter->thread_detail($thread_id);
        return $res;
    }

    /**
     * myThread
     * @param int $user_id
     * @return array
     */
    public function myThread(int $user_id): array
    {
        $res = $this->thread_interacter->myThread($user_id);
        return $res;
    }
}
