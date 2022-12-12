<?php

namespace App\Repositories\Thread;

use App\Models\Thread;
use Illuminate\Support\Facades\DB;
use Psy\Readline\Hoa\Exception;
use App\Entities\ThreadEntity;
use Throwable;

class ThreadRepository implements ThreadRepositoryInterface
{

    public function index()
    {
        $threads = Thread::orderBy('created_at', 'desc')->get();
        return $threads;
    }

    public function store($request)
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
    }

    public function findById($thread_id)
    {
        try {
            $thread = Thread::find($thread_id);
            return new ThreadEntity(
                $thread->id,
                $thread->user_id,
                $thread->title,
                $thread->content,
            );
        } catch (Throwable $e) {
            throw new Exception($e);
        }
    }
}

