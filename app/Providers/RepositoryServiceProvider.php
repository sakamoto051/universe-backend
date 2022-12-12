<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     * @return void
     */
    public function register()
    {
        $this->app->bind(\App\Repositories\Thread\ThreadRepositoryInterface::class, \App\Repositories\Thread\ThreadRepository::class);
        $this->app->bind(\App\Repositories\Comment\CommentRepositoryInterface::class, \App\Repositories\Comment\CommentRepository::class);
    }
}
