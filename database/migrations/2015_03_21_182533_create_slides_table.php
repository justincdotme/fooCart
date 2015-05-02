<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlidesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('slides', function(Blueprint $table)
		{
            $table->increments('slide_id');
            $table->integer('slideshow_id')->unsigned()->index();
            $table->foreign('slideshow_id')->references('slideshow_id')->on('slideshows')->onDelete('cascade');
            $table->string('href')->nullable();
            $table->integer('sequence')->nullable();
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
		Schema::drop('slides');
	}

}
