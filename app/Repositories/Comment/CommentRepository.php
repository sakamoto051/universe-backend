<?php

namespace App\Repositories\Comment;

use App\Entities\CommentEntity;
use App\Models\Comment;
use Psy\Readline\Hoa\Exception;
use Throwable;

class CommentRepository implements CommentRepositoryInterface
{
    public function findByThreadId($thread_id)
    {
        try {
            $comments = Comment::where('thread_id', $thread_id)->orderByDesc('created_at')->get();
            $comment_entities = [];
            foreach ($comments as $comment) {
                $comment_entities[] = new CommentEntity(
                    $comment->id,
                    $comment->user_id,
                    $comment->thread_id,
                    $comment->content,
                );
            }
            return $comment_entities;
        } catch (Throwable $e) {
            throw new Exception($e);
        }
    }
}

