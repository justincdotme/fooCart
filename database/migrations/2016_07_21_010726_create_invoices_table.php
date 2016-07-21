<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')
                ->unsigned()
                ->index();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->integer('status_id')
                ->unsigned()
                ->index();
            $table->foreign('status_id')
                ->references('id')
                ->on('invoice_statuses')
                ->onDelete('cascade');
            $table->timestamp('completed_on');
            $table->timestamp('shipped_on');
            $table->integer('shipping_type_id')
                ->unsigned()
                ->index();
            $table->foreign('shipping_type_id')
                ->references('id')
                ->on('shipping_types')
                ->onDelete('cascade');
            $table->integer('bankcard_id')
                ->unsigned()
                ->index();
            $table->foreign('bankcard_id')
                ->references('id')
                ->on('id')
                ->onDelete('bankcards');
            $table->integer('promo_code_id')
                ->unsigned()
                ->index();
            $table->foreign('promo_code_id')
                ->references('id')
                ->on('promo_codes')
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
        Schema::drop('invoices');
    }
}
