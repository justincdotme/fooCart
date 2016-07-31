<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_items', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')
                ->unsigned()
                ->index()
                ->nullable();
            $table->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onDelete('cascade');
            $table->integer('type_id') //line item, product, etc
                ->unsigned()
                ->index();
            $table->foreign('type_id')
                ->references('id')
                ->on('invoice_item_types')
                ->onDelete('cascade');
            $table->integer('shipment_id')
                ->unsigned()
                ->index()
                ->nullable();
            $table->foreign('shipment_id')
                ->references('id')
                ->on('shipments')
                ->onDelete('cascade');
            $table->integer('invoice_id')
                ->unsigned()
                ->index()
                ->nullable();
            $table->foreign('invoice_id')
                ->references('id')
                ->on('invoices')
                ->onDelete('cascade');
            $table->integer('quantity');
            $table->decimal('unit_price', 19, 2);
            $table->integer('promo_code_id')
                ->unsigned()
                ->index()
                ->nullable();
            $table->foreign('promo_code_id')
                ->references('id')
                ->on('promo_codes')
                ->onDelete('cascade');
            $table->integer('tax_id')
                ->unsigned()
                ->index()
                ->nullable();
            $table->foreign('tax_id')
                ->references('id')
                ->on('tax_rates')
                ->onDelete('cascade');
            $table->decimal('shipping_total', 19, 2)
                ->nullable();
            $table->integer('shipping_option_id')
                ->unsigned()
                ->index()
                ->nullable();
            $table->foreign('shipping_option_id')
                ->references('id')
                ->on('shipping_options')
                ->onDelete('cascade');
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
        Schema::drop('invoice_items');
    }
}
