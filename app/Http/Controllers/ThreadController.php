<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreThreadRequest;
use App\Http\Requests\UpdateThreadRequest;
use App\Models\Thread;
use App\UseCases\Thread\ThreadInteracter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Psy\Readline\Hoa\Exception;
use Throwable;

class ThreadController extends Controller
{
    private $thread_interacter;

    public function __construct(ThreadInteracter $thread_interacter)
    {
        $this->thread_interacter = $thread_interacter;
    }

    public function index()
    {
        try {
            return Thread::orderBy('created_at', 'desc')->get();
        } catch (Throwable $e) {
            throw new Exception($e);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
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
        try {
            DB::beginTransaction();
            Thread::factory()->create([
                'user_id' => $request['user_id'],
                'title' => $request['title'],
                'content' =>$request['content'],
            ]);
            DB::commit();
        } catch (Throwable $e) {
            DB::rollBack();
            throw new Exception($e);
        }
        return response('SUCCESS', 200)->header('Content-Type', 'text/plain');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Thread  $thread
     * @return Thread $thread
     */
    public function show(Thread $thread)
    {
        return $thread;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Thread  $thread
     * @return \Illuminate\Http\Response
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
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateThreadRequest $request, Thread $thread)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function destroy(Thread $thread)
    {
        //
    }

    /**
     * Get thread comments
     * @param Request $request
     * @return array
     */
    public function thread_comments(Request $request)
    {
        return Thread::find($request['thread_id'])->comments;
    }
}
