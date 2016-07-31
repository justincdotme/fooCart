<?php

use fooCart\Core\Models\Slideshow;
use Illuminate\Database\Seeder;

class SlideshowTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $slideshows = [
            [
                'name' => 'Home Slideshow'
            ],
            [
                'name' => 'On Sale Slideshow'
            ]
        ];

        foreach($slideshows as $slideshow) {
            Slideshow::create($slideshow);
        }
    }
}
