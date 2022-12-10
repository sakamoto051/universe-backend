<?php

namespace App\Repositories\Thread;

use App\Entities\CommentEntity;
use App\Entities\ThreadDetailEntity;
use App\Models\Comment;
use App\Models\Thread;
use Illuminate\Support\Facades\DB;
use Psy\Readline\Hoa\Exception;
use App\Entities\ThreadEntity;
use ThreadDetailOutput;
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

    public function findById($id)
    {
        try {
            $thread = Thread::find($id);
            return $thread;
        } catch (Throwable $e) {
            throw new Exception($e);
        }
    }

    public function thread_detail($thread_id)
    {
        return Thread::with('comments')->find($thread_id);
    }
}

