<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('short_desc')
                ->nullable();
            $table->text('long_desc')
                ->nullable();
            $table->string('sku')
                ->unique();
            $table->decimal('unit_price', 19, 2);
            $table->decimal('sale_price', 19, 2)
                ->nullable();
            $table->decimal('weight', 19, 2)
                ->nullable();
            $table->enum('weight_measurement', ['lbs', 'kg'])
                ->nullable();
            $table->integer('manufacturer_id')
                ->unsigned()
                ->index();
            $table->foreign('manufacturer_id')
                ->references('id')
                ->on('manufacturers')
                ->onDelete('cascade');
            $table->integer('units_sold');
            $table->integer('units_available');
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
        Schema::drop('products');
    }
}
