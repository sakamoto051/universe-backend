<?php

namespace App\Repositories\Comment;

use App\Entities\CommentEntity;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;
use Psy\Readline\Hoa\Exception;
use Throwable;

class CommentRepository implements CommentRepositoryInterface
{
    public function findByThreadId($thread_id)
    {
        try {
            $comments = Comment::where('thread_id', $thread_id)->orderBy('comment_no')->get();
            $comment_entities = [];
            foreach ($comments as $comment) {
                $comment_entities[] = new CommentEntity(
                    $comment->id,
                    $comment->user_id,
                    $comment->thread_id,
                    $comment->comment_no,
                    $comment->content,
                    $comment->created_at,
                );
            }
            return $comment_entities;
        } catch (Throwable $e) {
            throw new Exception($e);
        }
    }

    public function storeComment($user_id, $thread_id, $content)
    {
        try {
            $last_comment_no = DB::table('comments')
                ->select(DB::raw('COUNT(*) as comment_num'))
                ->where('thread_id', $thread_id)
                ->first();
            $comment_no = $last_comment_no->comment_num + 1;
            $comment = Comment::create([
                'user_id' => $user_id,
                'thread_id' => $thread_id,
                'comment_no' => $comment_no,
                'content' => $content,
            ]);
            return $comment;
        } catch (Throwable $e) {
            throw new Exception($e);
        }
    }
}

