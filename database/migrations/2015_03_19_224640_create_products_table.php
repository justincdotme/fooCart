<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function(Blueprint $table)
        {
            $table->increments('product_id');
            $table->string('sku')->unique();
            $table->integer('manufacturer_id')->unsigned()->index();
            $table->foreign('manufacturer_id')->references('manufacturer_id')->on('manufacturers')->onDelete('cascade');
            $table->integer('category_id')->unsigned()->index();
            $table->foreign('category_id')->references('category_id')->on('categories')->onDelete('cascade');
            $table->string('name');
            $table->decimal('price', 19, 2)->nullable();
            $table->text('short_desc');
            $table->text('long_desc');
            $table->decimal('sale_price', 19, 2)->nullable();
            $table->decimal('shipping_cost', 19, 2);
            $table->integer('units_sold')->nullable();
            $table->integer('number_available');
            $table->integer('tax_id')->unsigned()->index();
            $table->foreign('tax_id')->references('tax_id')->on('taxes')->onDelete('cascade');
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
		Schema::drop('products');
	}
}
