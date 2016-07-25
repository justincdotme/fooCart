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
            $table->string('sku')
                ->nullable();
            $table->string('manufacturer')
                ->nullable();
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
            $table->string('name');
            $table->integer('quantity');
            $table->decimal('unit_price', 19, 2);
            $table->decimal('weight', 19, 2)
                ->nullable();
            $table->enum('weight_measurement', ['lbs', 'kg'])
                ->nullable();
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
