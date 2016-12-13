<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new Category([
        	'name' => 'Laptop',
        ]);

        $category->save();

        $category = new Category([
        	'name' => 'Desktop',
        ]);

        $category->save();

        $category = new Category([
        	'name' => 'Tablet',
        ]);

        $category->save();

        $category = new Category([
        	'name' => 'All In One',
        ]);

        $category->save();
  
        $category = new Category([
        	'name' => 'Gaming',
        ]);

        $category->save();

        $category = new Category([
        	'name' => 'Nature',
        ]);

        $category->save();

    }
}