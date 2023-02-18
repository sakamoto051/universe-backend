<?php

namespace App\Repositories\Comment;

use App\Entities\CommentEntity;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;
use Psy\Readline\Hoa\Exception;
use Throwable;

class CommentRepository implements CommentRepositoryInterface
{
    /**
     * Summary of findByThreadId
     * @param int $thread_id
     * @throws Exception
     * @return array
     */
    public function findByThreadId(int $thread_id): array
    {
        try {
            $comments = Comment::where('thread_id', $thread_id)->orderBy('comment_no')->get();
            $res = [];
            foreach ($comments as $comment) {
                $res[] = new CommentEntity(
                    $comment->id,
                    $comment->user_id,
                    $comment->thread_id,
                    $comment->comment_no,
                    $comment->content,
                    $comment->created_at,
                );
            }
            return $res;
        } catch (Throwable $e) {
            throw new Exception($e);
        }
    }

    /**
     * Summary of storeComment
     * @param int $user_id
     * @param int $thread_id
     * @param string $content
     * @throws Exception
     * @return CommentEntity
     */
    public function storeComment(int $user_id, int $thread_id, string $content): CommentEntity
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

            $res = new CommentEntity(
                $comment->id,
                $comment->user_id,
                $comment->thread_id,
                $comment->comment_no,
                $comment->content,
                $comment->created_at
            );
            return $res;
        } catch (Throwable $e) {
            throw new Exception($e);
        }
    }
}

