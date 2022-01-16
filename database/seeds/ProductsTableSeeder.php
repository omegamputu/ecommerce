<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Twilight
        for ($i=1; $i <= 5; $i++) {
            Product::create([
                'name' => 'Twilight '.$i,
                'slug' => 'twilight-'.$i,
                'details' => 'Information sur l\'Auteur, ' . ' Editeur , Edition',
                'price' => rand(5, 29),
                'description' =>'Lorem '. $i . ' ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
                'image' => 'books/dummy/twilight-'.$i.'.jpg',
                'images' => '["books\/dummy\/twilight-2.jpg","books\/dummy\/twilight-3.jpg","books\/dummy\/twilight-4.jpg"]',
            ])->categories()->attach(1);
        }
        // Make Laptop 1 a Desktop as well. Just to test multiple categories
        $product = Product::find(1);
        $product->categories()->attach(2);
        
         // People of the book
         for ($i = 1; $i <= 6; $i++) {
            Product::create([
                'name' => 'People of the book ' . $i,
                'slug' => 'people-' . $i,
                'details' => 'Information sur l\'Auteur, ' . ' Editeur , Edition',
                'price' => rand(10, 39),
                'description' => 'Lorem ' . $i . ' ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
                'image' => 'books/dummy/people-'.$i.'.jpg',
                'images' => '["books\/dummy\/people-2.jpg","books\/dummy\/people-3.jpg","books\/dummy\/people-4.jpg"]',
            ])->categories()->attach(2);
        }
        // Thee secret letter
        for ($i = 1; $i <= 4; $i++) {
            Product::create([
                'name' => 'The secret letter ' . $i,
                'slug' => 'secret-' . $i,
                'details' => 'Information sur l\'Auteur, ' . ' Editeur , Edition',
                'price' => rand(7, 12),
                'description' => 'Lorem ' . $i . ' ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
                'image' => 'books/dummy/secret-'.$i.'.jpg',
                'images' => '["books\/dummy\/secret-2.jpg","books\/dummy\/secret-3.jpg","books\/dummy\/secret-4.jpg"]',
            ])->categories()->attach(3);
        }
        // East of eden
        for ($i = 1; $i <= 5; $i++) {
            Product::create([
                'name' => 'East-of-eden ' . $i,
                'slug' => 'east-' . $i,
                'details' => 'Information sur l\'Auteur, ' . ' Editeur , Edition',
                'price' => rand(14, 25),
                'description' => 'Lorem ' . $i . ' ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
                'image' => 'books/dummy/east-'.$i.'.jpg',
                'images' => '["books\/dummy\/east-2.jpg","books\/dummy\/east-3.jpg","books\/dummy\/east-4.jpg"]',
            ])->categories()->attach(4);
        }
        // Lone some dove
        for ($i = 1; $i <= 4; $i++) {
            Product::create([
                'name' => 'Lone some dove ' . $i,
                'slug' => 'lone-' . $i,
                'details' => 'Information sur l\'Auteur, ' . ' Editeur , Edition',
                'price' => rand(14, 39),
                'description' => 'Lorem ' . $i . ' ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
                'image' => 'books/dummy/lone-'.$i.'.jpg',
                'images' => '["books\/dummy\/lone-2.jpg","books\/dummy\/lone-3.jpg","books\/dummy\/lone-4.jpg"]',
            ])->categories()->attach(5);
        }
        // The historian
        for ($i = 1; $i <= 7; $i++) {
            Product::create([
                'name' => 'The historian ' . $i,
                'slug' => 'historian-' . $i,
                'details' => 'Information sur l\'Auteur, ' . ' Editeur , Edition',
                'price' => rand(13, 16),
                'description' => 'Lorem ' . $i . ' ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
                'image' => 'books/dummy/historian-'.$i.'.jpg',
                'images' => '["books\/dummy\/historian-2.jpg","books\/dummy\/historian-3.jpg","books\/dummy\/historian-4.jpg"]',
            ])->categories()->attach(6);
        }
        // Cold mountain
        for ($i = 1; $i <= 6; $i++) {
            Product::create([
                'name' => 'Cold mountain ' . $i,
                'slug' => 'mountain-' . $i,
                'details' => 'Information sur l\'Auteur, ' . ' Editeur , Edition',
                'price' => rand(13, 20),
                'description' => 'Lorem ' . $i . ' ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
                'image' => 'books/dummy/mountain-'.$i.'.jpg',
                'images' => '["books\/dummy\/mountain-2.jpg","books\/dummy\/mountain-3.jpg","books\/dummy\/mountain-4.jpg"]',
            ])->categories()->attach(7);
        }
        // Select random entries to be featured
        Product::whereIn('id', [1, 12, 22, 3,8, 19, 24, 26])->update(['featured' => true]);
    }
}
