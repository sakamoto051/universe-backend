<?php

namespace App\Http\Controllers;

use App\Http\Requests\FetchIdRequest;
use App\Http\Requests\StoreThreadRequest;
use App\Http\Requests\UpdateThreadRequest;
use App\Models\Thread;
use App\UseCases\Thread\ThreadInteracter;
use App\Http\Controllers\Controller;

class ThreadController extends Controller
{
    private $thread_interacter;

    public function __construct(ThreadInteracter $thread_interacter)
    {
        $this->thread_interacter = $thread_interacter;
    }

    /**
     * Index of Thread list.
     *
     * @return Thread[] $theads
     */
    public function index()
    {
        $threads = $this->thread_interacter->index();
        return $threads;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreThreadRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreThreadRequest $request)
    {
        $this->thread_interacter->store($request);
        return response('Success to store thread.', 200)->header('Content-Type', 'text/plain');
    }

    /**
     * Display the specified resource.
     *
     * @param FetchIdRequest $id
     * @return Thread $thread
     */
    // public function show(FetchIdRequest $id)
    public function show(Thread $thread)
    {
        // $thread = $this->thread_interacter->fetch($id);
        return $thread;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Thread  $thread
     * @return
     */
    public function edit(Thread $thread)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateThreadRequest  $request
     * @param  \App\Models\Thread  $thread
     * @return
     */
    public function update(UpdateThreadRequest $request, Thread $thread)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Thread  $thread
     * @return
     */
    public function destroy(Thread $thread)
    {
        //
    }

    public function thread_detail(int $thread_id)
    {
        $res = $this->thread_interacter->thread_detail($thread_id);
        return $res;
    }

    public function myThread(int $user_id)
    {
        $res = $this->thread_interacter->myThread($user_id);
        return $res;
    }
}
