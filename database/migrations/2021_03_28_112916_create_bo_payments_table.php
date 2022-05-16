<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBoPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bo_payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('bo_id')->unsigned();
            $table->integer('amount')->unsigned();
            $table->string('transaction_id')->unsigned();
            $table->integer('status')->unsigned();
            $table->integer('approved')->unsigned()->nullable();
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
        Schema::dropIfExists('bo_payments');
    }
}
