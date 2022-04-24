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
use Illuminate\Support\Carbon;

class PruneOldPostsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
//    protected $post;


    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        $oldPosts=Carbon::now()->subYears(2)->toDateTimeString();
        $oldPostsWithTwoYears=Post::where('created_at','<=',$oldPosts)->delete();
        return $oldPostsWithTwoYears;    }


}
