<?php

use Illuminate\Database\Seeder;
use fooCart\src\Slideshow;

class SlideshowsTableSeeder extends Seeder {

    public function run()
    {
        Slideshow::create(array(
            'name'    => 'Home Slideshow',
        ));
    }
}