<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImageChangeRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image_change_requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('bo_id');
            $table->text('ac_holder_image')->nullable();
            $table->text('ac_holder_front_page_nid_image')->nullable();
            $table->text('ac_holder_back_page_nid_image')->nullable();
            $table->text('ac_holder_signature')->nullable();
            $table->text('joint_ac_holder_image')->nullable();
            $table->text('joint_ac_holder_front_page_nid_image')->nullable();
            $table->text('joint_ac_holder_back_page_nid_image')->nullable();
            $table->text('joint_ac_holder_signature')->nullable();
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('image_change_requests');
    }
}
