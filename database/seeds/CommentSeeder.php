<?php

use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Comment', 10)->create([
			'post_id' => '1',
			'user_id' => '1',
		]);
    }
}
