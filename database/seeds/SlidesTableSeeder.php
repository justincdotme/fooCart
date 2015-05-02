<?php

use Illuminate\Database\Seeder;
use fooCart\src\Slide;

class SlidesTableSeeder extends Seeder {

    public function run()
    {
        Slide::create(array(
            'slideshow_id'  =>  1,
            'href'       => 'http://justinc.me',
            'sequence'   =>  1,
            'image_path' => '/images/slideshows/1/slide1.jpg',
            'active'     => true
        ));
        Slide::create(array(
            'slideshow_id'  =>  1,
            'href'       => 'http://laravel.com',
            'sequence'   =>  2,
            'image_path' => '/images/slideshows/1/slide2.jpg',
            'active'     => true
        ));
    }
}