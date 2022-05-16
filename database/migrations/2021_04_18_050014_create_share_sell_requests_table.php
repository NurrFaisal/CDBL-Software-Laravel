<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShareSellRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('share_sell_requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('share_id')->unsigned();
            $table->integer('client_share_id')->unsigned();
            $table->integer('client_id')->unsigned();
            $table->integer('sell_qty');
            $table->float('sell_price', 10, 2);
            $table->float('sell_total_price', 10 ,2);
            $table->float('sell_total_price_with_commission', 10 ,2);
            $table->tinyInteger('status');
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
        Schema::dropIfExists('share_sell_requests');
    }
}
