<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDseXmlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dse_xmls', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('security_code')->nullable();
            $table->string('isin')->nullable();
            $table->string('category')->nullable();
            $table->string('asset_class')->nullable();
            $table->string('sector')->nullable();
            $table->string('compulsory_spot')->nullable();
            $table->date('trade_date')->nullable();
            $table->float('close', 8, 2)->nullable();
            $table->float('open', 8, 2)->nullable();
            $table->float('high', 8, 2)->nullable();
            $table->float('low', 8, 2)->nullable();
            $table->string('var')->nullable();
            $table->string('var_percent')->nullable();
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
        Schema::dropIfExists('dse_xmls');
    }
}
