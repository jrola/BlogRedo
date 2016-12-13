<?php

use Illuminate\Database\Seeder;
use App\Tag;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tag = new Tag([
        	'name' => 'Windows',
        ]);

        $tag->save();

        $tag = new Tag([
        	'name' => 'Apple',
        ]);

        $tag->save();

        $tag = new Tag([
        	'name' => 'Nature',
        ]);

        $tag->save();

        $tag = new Tag([
        	'name' => 'Keyboard',
        ]);

        $tag->save();

        $tag = new Tag([
        	'name' => 'Windows',
        ]);

        $tag->save();

        $tag = new Tag([
        	'name' => 'Gaming',
        ]);

        $tag->save();
    }
}
