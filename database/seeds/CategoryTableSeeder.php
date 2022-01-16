<?php

use App\Category;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $now = Carbon::now()->toDateTimeString();

        Category::insert([
            ['name' => 'E-Book', 'slug' => 'e-book', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Business', 'slug' => 'business', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Apprentissage', 'slug' => 'apprentissage', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Science', 'slug' => 'science', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Mathématique', 'slug' => 'mathématique', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Histoire', 'slug' => 'histoire', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Informatique', 'slug' => 'informatique', 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
