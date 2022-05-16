<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobXmlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_xmls', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('action')->nullable();
            $table->string('status')->nullable();
            $table->string('isin')->nullable();
            $table->string('asset_class')->nullable();
            $table->string('order_id')->nullable();
            $table->string('ref_order_id')->nullable();
            $table->string('side')->nullable();
            $table->string('bo_id')->nullable();
            $table->string('security_code')->nullable();
            $table->string('board')->nullable();
            $table->date('date')->nullable();
            $table->string('time')->nullable();
            $table->integer('quantity')->nullable();
            $table->float('price' )->nullable();
            $table->float('value', 20, 2)->nullable();
            $table->string('exec_id')->nullable();
            $table->string('session')->nullable();
            $table->string('fill_type')->nullable();
            $table->string('category')->nullable();
            $table->string('compulsory_spot')->nullable();
            $table->string('client_code')->nullable();
            $table->string('trader_dealer_id')->nullable();
            $table->string('owner_dealer_id')->nullable();
            $table->string('trade_report_type')->nullable();
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
        Schema::dropIfExists('job_xmls');
    }
}
