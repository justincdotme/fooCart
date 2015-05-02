<?php

use Illuminate\Database\Seeder;
use fooCart\src\Category;


class CategoriesTableSeeder extends Seeder {

    public function run()
    {
        Category::create(array(
            'category'        => 'Televisions'
        ));
        Category::create(array(
            'category'        => 'Mobile Devices'
        ));
        Category::create(array(
            'category'        => 'Monitors'
        ));
        Category::create(array(
            'category'        => 'Computers'
        ));
    }
}