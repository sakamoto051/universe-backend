<?php

namespace App\UseCases\Thread;

use App\Http\Requests\StoreThreadRequest;
use App\Services\Comment\CommentService;
use App\Services\Thread\ThreadService;
use App\Values\Comment\CommentOutput;
use App\Values\Thread\StoreThreadInput;
use App\Values\Thread\ThreadOutput;
use App\Values\Thread\ThreadDetailOutput;

class ThreadInteracter
{
    private $thread_service;
    private $comment_service;

    public function __construct(
        ThreadService $thread_service,
        CommentService $comment_service,
    ) {
        $this->thread_service = $thread_service;
        $this->comment_service = $comment_service;
    }

    /**
     * index
     * @return array
     */
    public function index(): array
    {
        $res = $this->thread_service->index();
        $output = [];
        foreach ($res as $thread) {
            $entity = new ThreadOutput(
                $thread->id,
                $thread->user_id,
                $thread->title,
            );
            $output[] = $entity->toArray();
        }
        return $output;
    }

    /**
     * store
     * @param StoreThreadRequest $request
     * @return void
     */
    public function store(StoreThreadRequest $request): void
    {
        $input = new StoreThreadInput(
        $request->user_id,
        $request->title,
        $request->content,
        );
        $this->thread_service->store($input);
    }

    public function thread_detail($thread_id)
    {
        $thread = $this->thread_service->findById($thread_id);
        $comments = $this->comment_service->findByThreadId($thread_id);

        $threadOutput = new ThreadOutput(
            $thread->id,
            $thread->user_id,
            $thread->title,
        );
        $threadOutput = $threadOutput->toArray();

        $commentsOutput = [];
        foreach ($comments as $comment) {
            $commentOutput = new CommentOutput(
                $comment->id,
                $comment->user_id,
                $comment->thread_id,
                $comment->comment_no,
                $comment->content,
                $comment->created_at,
            );
            $commentsOutput[] = $commentOutput->toArray();
        }

        $thread_detail = new ThreadDetailOutput(
            $threadOutput,
            $commentsOutput,
        );

        return $thread_detail->toArray();
    }

    public function myThread($user_id)
    {
        $threads = $this->thread_service->myThread($user_id);
        $threads_output = [];
        foreach ($threads as $thread) {
            $output = new ThreadOutput(
                $thread->id,
                $thread->user_id,
                $thread->title,
            );
            $threads_output[] = $output->toArray();
        }
        return $threads_output;
    }
}
