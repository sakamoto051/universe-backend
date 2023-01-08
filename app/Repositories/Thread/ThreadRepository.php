<?php

namespace App\Repositories\Thread;

use App\Models\Comment;
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
            $thread_id = Thread::factory()->create([
                'user_id' => $request->user_id,
                'title' => $request->title,
            ])->id;

            $last_comment_no = DB::table('comments')
                ->select(DB::raw('COUNT(*) as comment_num'))
                ->where('thread_id', $thread_id)
                ->first();
            $comment_no = $last_comment_no->comment_num + 1;

            Comment::create([
                'user_id' => $request->user_id,
                'thread_id' => $thread_id,
                'comment_no' => $comment_no,
                'content' => $request->content,
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
            );
        } catch (Throwable $e) {
            throw new Exception($e);
        }
    }
}

