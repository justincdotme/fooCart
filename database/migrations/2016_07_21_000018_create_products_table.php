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
            $table->text('short_desc');
            $table->text('long_desc');
            $table->string('sku')
                ->unique();
            $table->decimal('unit_price', 19, 2)
                ->nullable();
            $table->decimal('sale_price', 19, 2)
                ->nullable();
            $table->decimal('weight', 19, 2);
            $table->integer('manufacturer_id')
                ->unsigned()
                ->index();
            $table->foreign('manufacturer_id')
                ->references('id')
                ->on('manufacturers')
                ->onDelete('cascade');
            $table->integer('category_id')
                ->unsigned()
                ->index();
            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade');
            $table->integer('units_sold')
                ->nullable();
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
