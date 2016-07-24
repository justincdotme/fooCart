<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateShippingOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping_options', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('delivery_time')
                ->nullable();
            $table->decimal('rate', 19, 2)
                ->nullable();
            $table->enum('rate_measurement', ['weight', 'price'])
                ->nullable();
            $table->timestamp('active_on')
                ->nullable();
            $table->timestamp('expires_on')
                ->nullable();
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
        Schema::drop('shipping_options');
    }
}
