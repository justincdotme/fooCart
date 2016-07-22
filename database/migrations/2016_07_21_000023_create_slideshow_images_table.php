<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateSlideshowImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slideshow_images', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('slideshow_id')
                ->unsigned()
                ->index();
            $table->foreign('slideshow_id')
                ->references('id')
                ->on('slideshows')
                ->onDelete('cascade');
            $table->string('href')
                ->nullable();
            $table->string('alt_text')
                ->nullable();
            $table->integer('sequence')
                ->nullable();
            $table->string('image_path');
            $table->boolean('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('slideshow_images');
    }
}
