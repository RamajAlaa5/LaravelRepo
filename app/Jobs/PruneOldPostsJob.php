<?php

namespace App\Jobs;
use App\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Collection;
use App\QueuesJob\HandleJob;

class PruneOldPostsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
//    protected $post;
protected Collection $post;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Collection $post)
    {
        $this->post=$post;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
   {
       $handlePosts = new HandleJob();
       $handlePosts->setPosts($this->post);
       $handlePosts->pruneDeletedPosts();

    }


}