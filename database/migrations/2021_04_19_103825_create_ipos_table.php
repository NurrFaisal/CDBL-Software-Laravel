<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ipos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('company_name');
            $table->string('ipo_name');
            $table->integer('lot_size');
            $table->float('price', 10, 2);
            $table->date('start_date');
            $table->date('end_date');
            $table->string('mr_no')->nullable();
            $table->string('ac_type')->nullable();
            $table->string('rcv_type')->nullable();
            $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('ipos');
    }
}
