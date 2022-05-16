<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientSharesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_shares', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('share_id')->unsigned();
            $table->integer('client_id')->unsigned();
            $table->integer('purchase_qty')->nullable();
            $table->integer('sell_qty')->nullable();
            $table->integer('available_qty')->nullable();
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
        Schema::dropIfExists('client_shares');
    }
}
