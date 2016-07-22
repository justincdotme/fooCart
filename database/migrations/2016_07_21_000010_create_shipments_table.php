<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateShipmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipments', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('invoice_id')
                ->unsigned()
                ->index();
            $table->foreign('invoice_id')
                ->references('id')
                ->on('invoices')
                ->onDelete('cascade');
            $table->integer('shipping_option_id')
                ->unsigned()
                ->index();
            $table->foreign('shipping_option_id')
                ->references('id')
                ->on('shipping_options')
                ->onDelete('cascade');
            $table->integer('shipping_address_id')
                ->unsigned()
                ->index();
            $table->foreign('shipping_address_id')
                ->references('id')
                ->on('addresses')
                ->onDelete('cascade');
            $table->decimal('shipping_cost', 19, 2);
            $table->string('tracking_number')
                ->nullable();
            $table->timestamp('shipped_on')
                ->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('shipments');
    }
}
