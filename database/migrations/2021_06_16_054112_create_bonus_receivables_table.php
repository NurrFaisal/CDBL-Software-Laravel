<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBonusReceivablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bonus_receivables', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            $table->string('bo_id');
            $table->string('name');
            $table->string('security_code');
            $table->float('value', 10, 2);
            $table->integer('amount');
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
        Schema::dropIfExists('bonus_receivables');
    }
}
