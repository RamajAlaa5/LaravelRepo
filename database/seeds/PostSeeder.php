<?php

use Illuminate\Database\Seeder;
use App\Post;
class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::factory()->count(5)->create();
    }
}



