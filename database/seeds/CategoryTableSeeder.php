<?php

use fooCart\Core\Models\Category;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $categories = [
            [
                'name'        => 'Televisions',
                'description' => $faker->text(150)
            ],
            [
                'name'        => 'Mobile Devices',
                'description' => $faker->text(150)
            ],
            [
                'name'        => 'Monitors',
                'description' => $faker->text(150)
            ],
            [
                'name'        => 'Computers',
                'description' => $faker->text(150)
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
