<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('order_products', function(Blueprint $table)
		{
            $table->increments('order_product_id');
            $table->integer('order_id')->unsigned()->index();
            $table->foreign('order_id')->references('order_id')->on('orders')->onDelete('cascade');
            $table->string('sku');
            $table->string('manufacturer');
            $table->string('name');
            $table->decimal('price', 19, 2);
            $table->decimal('shipping', 19, 2);
            $table->decimal('tax', 3, 2);
            $table->integer('quantity');
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
		Schema::drop('order_products');
	}

}
