<?php

use Illuminate\Database\Seeder;

class PostsTagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $postsTagsTableData = [
            [
                'post_id' => 1,
                'tag_id' => 1
            ],
            [
                'post_id' => 1,
                'tag_id' => 2
            ],
            [
                'post_id' => 2,
                'tag_id' => 1
            ],
            [
                'post_id' => 2,
                'tag_id' => 2
            ]
        ];

        DB::table('posts_tags')->insert($postsTagsTableData);
    }
}
