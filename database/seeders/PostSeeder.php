<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $posts = Post::factory(10)->create();

         foreach ($posts as $post) {
             $tags = Tag::factory(3)->create();

             foreach($tags as $tag){
                 $post->tags()->attach([
                     'tag_id' => $tag->id
                 ]);
             }
         }
    }
}
