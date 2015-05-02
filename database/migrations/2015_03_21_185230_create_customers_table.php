<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('order_customers', function(Blueprint $table)
		{
            $table->increments('customer_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('addr_street_1');
            $table->string('addr_street_2')->nullable();
            $table->string('addr_city');
            $table->string('addr_state');
            $table->integer('addr_zip');
            $table->bigInteger('home_phone');
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
		Schema::drop('customers');
	}

}
