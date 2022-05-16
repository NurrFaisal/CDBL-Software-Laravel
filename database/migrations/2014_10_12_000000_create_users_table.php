<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('bo_id')->unsigned()->nullable();
            $table->string('dse_bo_id')->nullable();
            $table->integer('traders')->unsigned()->nullable();
            $table->integer('commission')->unsigned()->nullable();
            $table->string('name');
            $table->tinyInteger('gender')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('nid_passport')->nullable();
            $table->string('nationality')->nullable();
            $table->string('fathers_name')->nullable();
            $table->string('mothers_name')->nullable();
            $table->string('email')->unique();
            $table->string('mobile_one')->nullable();
            $table->string('mobile_two')->nullable();
            $table->text('present_address')->nullable();
            $table->string('present_division')->nullable();
            $table->integer('present_district')->unsigned()->nullable();
            $table->integer('present_post_code')->nullable();
            $table->text('permanent_address')->nullable();
            $table->string('permanent_division')->nullable();
            $table->integer('permanent_district')->unsigned()->nullable();
            $table->integer('permanent_post_code')->nullable();
            $table->string('last_qualification')->nullable();
            $table->string('last_degree_attachment')->nullable();
            $table->string('employee_id')->nullable();
            $table->string('designation')->nullable();
            $table->integer('branch')->unsigned()->nullable();
            $table->text('photo')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->tinyInteger('is_admin')->default(0);
            $table->string('admin_type')->nullable();
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
        Schema::dropIfExists('users');
    }
}
