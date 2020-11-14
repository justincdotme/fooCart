<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('sku');
            $table->unsignedBigInteger('manufacturer_id')->index();
            $table->foreign('manufacturer_id')->references('id')->on('manufacturers')->onDelete('cascade');
            $table->string('name');
            $table->text('short_desc');
            $table->text('long_desc');
            //todo: product pricing should be refactored to be based on qty
            $table->decimal('unit_price', 19, 2)->nullable();
            $table->decimal('sale_price', 19, 2)->nullable();
            $table->unsignedBigInteger('shipping_method_id')->index();
            $table->foreign('shipping_method_id')->references('id')->on('shipping_methods')->onDelete('cascade');
            $table->integer('units_available');
            //todo: product availability should be based on pricing and inventory
            $table->boolean('active');
            $table->timestamps();
            $table->unique(['sku', 'active']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
