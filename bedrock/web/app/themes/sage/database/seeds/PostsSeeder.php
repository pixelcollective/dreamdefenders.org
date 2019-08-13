<?php

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->seedPosts(Faker::create(Post::class), 20);
    }

    /**
     * Seed posts
     *
     * @param  Faker $faker
     * @param  int   $count
     * @return void
     */
    protected function seedPosts(Faker $faker, int $count)
    {
        DB::table('wp_posts')->insert([
            'post_title'    => $faker->sentence(),
            'post_excerpt'  => $faker->sentence(),
            'post_content'  => $faker->paragraph(),
            'post_date'     => \Carbon\Carbon::now('America/Vancouver'),
            'post_modified' => \Carbon\Carbon::now(),
        ]);
    }
}
