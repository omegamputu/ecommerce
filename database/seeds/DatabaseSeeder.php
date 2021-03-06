<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       $this->call(AdminUserTableSeeder::class);
       //factory(App\User::class, 10)->create();
       factory(App\Author::class, 50)->create();
       $this->call(CategoryTableSeeder::class);
       $this->call(ProductsTableSeeder::class);
       $this->call(CouponsTableSeeder::class);
       //$this->call(OrdersTableSeeder::class);
    }
}
