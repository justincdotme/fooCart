<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductImagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product_images', function(Blueprint $table)
        {
            $table->increments('image_id');
            $table->integer('product_id')->unsigned()->index();
            $table->foreign('product_id')->references('product_id')->on('products')->onDelete('cascade');
            $table->string('image_path');
            $table->timestamps();
        });
	}

	/**
	 * Reverse the migrations.
	 *+
	 * @return void
	 */
	public function down()
	{
		Schema::drop('product_images');
	}

}
