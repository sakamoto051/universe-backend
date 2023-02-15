<?php

namespace App\Repositories\Thread;

use App\Models\Comment;
use App\Models\Thread;
use Illuminate\Support\Facades\DB;
use Psy\Readline\Hoa\Exception;
use App\Entities\ThreadEntity;
use App\Values\Thread\StoreThreadInput;
use Throwable;

class ThreadRepository implements ThreadRepositoryInterface
{

    /**
     * index
     * @return array
     */
    public function index(): array
    {
        $threads = Thread::orderBy('created_at', 'desc')->get();
        $res = [];
        foreach ($threads as $thread) {
            $res[] = new ThreadEntity(
                $thread->id,
                $thread->user_id,
                $thread->title,
            );
        }
        return $res;
    }

    /**
     * store
     * @param StoreThreadInput $input
     * @return void
     */
    public function store(StoreThreadInput $input): void
    {
        try {
            DB::beginTransaction();
            $thread_id = Thread::factory()->create([
                'user_id' => $input->user_id,
                'title' => $input->title,
            ])->id;

            $last_comment_no = DB::table('comments')
                ->select(DB::raw('COUNT(*) as comment_num'))
                ->where('thread_id', $thread_id)
                ->first();
            $comment_no = $last_comment_no->comment_num + 1;

            Comment::create([
                'user_id' => $input->user_id,
                'thread_id' => $thread_id,
                'comment_no' => $comment_no,
                'content' => $input->content,
            ]);
            DB::commit();
        } catch (Throwable $e) {
            DB::rollBack();
            throw new Exception($e);
        }
    }

    /**
     * Summary of findById
     * @param int $thread_id
     * @throws Exception
     * @return ThreadEntity
     */
    public function findById(int $thread_id): ThreadEntity
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

    /**
     * Summary of myThread
     * @param int $user_id
     * @throws Exception
     * @return array
     */
    public function myThread(int $user_id): array
    {
        try {
            $threads = Thread::where('user_id', $user_id)->orderByDesc('created_at')->get();
            foreach ($threads as $thread) {
                $res[] = new ThreadEntity(
                    $thread->id,
                    $thread->user_id,
                    $thread->title,
                );
            }
            return $res;
        } catch (Throwable $e) {
            throw new Exception($e);
        }
    }
}

