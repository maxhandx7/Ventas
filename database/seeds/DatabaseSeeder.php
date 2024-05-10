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
        // $this->call(UsersTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(UsersTableSeeder::class);

        $this->call(BusinessTableSeeder::class);
        $this->call(PrinterTableSeeder::class);
        factory(App\Client::class, 10)->create();
        factory(App\Category::class, 10)->create();
        factory(App\Subcategory::class, 50)->create();
        factory(App\Provider::class, 10)->create();
        factory(App\Product::class, 24)->create()->each(function ($product) {
            $product->images()->saveMany(factory(App\Image::class, 2)->make());
        });
        factory(App\Tag::class, 10)->create();

    }
}
