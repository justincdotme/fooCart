<?php

use fooCart\Core\Models\SlideshowImage;
use Illuminate\Database\Seeder;

class SlidesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $slideshowImages = [
            [
                'slideshow_id'  =>  1,
                'href'       => 'https://laravel.com',
                'alt_text'   => 'Slideshow 1 image 2',
                'sequence'   =>  2,
                'image_path' => '/images/slideshows/1/slide2.jpg',
                'active'     => true
            ],
            [
                'slideshow_id'  =>  1,
                'href'       => 'https://justinc.me',
                'alt_text'   => 'Slideshow 1 image 1',
                'sequence'   =>  1,
                'image_path' => '/images/slideshows/1/slide1.jpg',
                'active'     => true
            ],
            [
                'slideshow_id'  =>  2,
                'href'       => 'https://laravel.com',
                'alt_text'   => 'Slideshow 2 image 1',
                'sequence'   =>  1,
                'image_path' => '/images/slideshows/1/slide2.jpg',
                'active'     => true
            ],
            [
                'slideshow_id'  =>  2,
                'href'       => 'https://justinc.me',
                'alt_text'   => 'Slideshow 1 image 2',
                'sequence'   =>  2,
                'image_path' => '/images/slideshows/1/slide1.jpg',
                'active'     => true
            ]
        ];

        foreach($slideshowImages as $slideshowImage) {
            SlideshowImage::create($slideshowImage);
        }
    }
}
