<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBoAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bo_accounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('mobile');
            $table->string('email');
            $table->string('user_name');
            $table->string('password');
            $table->integer('status')->default(0);
            $table->integer('type_of_client')->nullable();
            $table->string('occupation')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('fathers_name')->nullable();
            $table->string('mothers_name')->nullable();
            $table->text('contact_address')->nullable();
            $table->integer('post_code')->nullable();
            $table->string('city')->nullable();
            $table->string('division')->nullable();
            $table->string('country')->nullable();
            $table->string('tel')->nullable();
            $table->string('fax')->nullable();
            $table->string('nationality')->nullable();
            $table->string('nid')->nullable();
            $table->string('tin')->nullable();
            $table->integer('gender')->nullable();
            $table->integer('residency')->nullable();
            $table->string('branch')->nullable();
            $table->string('passport_info')->nullable();
            $table->string('visa_info')->nullable();
            $table->string('permit_info')->nullable();
            $table->string('join_first_name')->nullable();
            $table->string('join_last_name')->nullable();
            $table->string('join_occupation')->nullable();
            $table->string('join_date_of_birth')->nullable();
            $table->string('join_fathers_name')->nullable();
            $table->string('join_mothers_name')->nullable();
            $table->string('join_contact_address')->nullable();
            $table->string('join_city')->nullable();
            $table->string('join_post_code')->nullable();
            $table->string('join_division')->nullable();
            $table->string('join_country')->nullable();
            $table->string('join_mobile')->nullable();
            $table->string('join_tel')->nullable();
            $table->string('join_fax')->nullable();
            $table->string('join_email')->nullable();
            $table->tinyInteger('is_director')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('bank_district')->nullable();
            $table->string('bank_branch')->nullable();
            $table->string('bank_routing')->nullable();
            $table->string('bank_ac')->nullable();
            $table->string('n1_title')->nullable();
            $table->string('n1_first_name')->nullable();
            $table->string('n1_last_name')->nullable();
            $table->string('n1_rel_with_ac_holder')->nullable();
            $table->integer('n1_percentage')->nullable();
            $table->tinyInteger('n1_residency')->nullable();
            $table->date('n1_date_of_birth')->nullable();
            $table->string('n1_nid')->nullable();
            $table->string('n1_address')->nullable();
            $table->string('n1_city')->nullable();
            $table->integer('n1_post_code')->nullable();
            $table->string('n1_division')->nullable();
            $table->string('n1_country')->nullable();
            $table->string('n1_mobile')->nullable();
            $table->string('n1_tel')->nullable();
            $table->string('n1_fax')->nullable();
            $table->string('n1_email')->nullable();
            $table->tinyInteger('n2')->nullable();
            $table->string('n2_title')->nullable();
            $table->string('n2_first_name')->nullable();
            $table->string('n2_last_name')->nullable();
            $table->string('n2_rel_with_ac_holder')->nullable();
            $table->integer('n2_percentage')->nullable();
            $table->tinyInteger('n2_residency')->nullable();
            $table->date('n2_date_of_birth')->nullable();
            $table->string('n2_nid')->nullable();
            $table->string('n2_address')->nullable();
            $table->string('n2_city')->nullable();
            $table->integer('n2_post_code')->nullable();
            $table->string('n2_division')->nullable();
            $table->string('n2_country')->nullable();
            $table->string('n2_mobile')->nullable();
            $table->string('n2_tel')->nullable();
            $table->string('n2_fax')->nullable();
            $table->string('n2_email')->nullable();
            $table->string('ac_holder_image')->nullable();
            $table->text('front-page-nid-image')->nullable();
            $table->text('back-page-nid-image')->nullable();
            $table->text('ac_holder_signature')->nullable();
            $table->text('ac_holder_cheque_book_leaf')->nullable();
            $table->integer('payment_amount')->nullable();
            $table->tinyInteger('payment_status')->default(0);
            $table->integer('traders_id')->nullable();
            $table->tinyInteger('n1g')->nullable();
            $table->string('n1g_title')->nullable();
            $table->string('n1g_first_name')->nullable();
            $table->string('n1g_last_name')->nullable();
            $table->string('n1g_rel_with_ac_holder')->nullable();
            $table->integer('n1g_percentage')->nullable();
            $table->tinyInteger('n1g_residency')->nullable();
            $table->date('n1g_date_of_birth')->nullable();
            $table->string('n1g_nid')->nullable();
            $table->text('n1g_address')->nullable();
            $table->integer('n1g_city')->unsigned()->nullable();
            $table->string('n1g_division')->unsigned()->nullable();
            $table->string('n1g_country')->unsigned()->nullable();
            $table->string('n1g_mobile')->unsigned()->nullable();
            $table->string('n1g_tel')->unsigned()->nullable();
            $table->string('n1g_fax')->unsigned()->nullable();
            $table->string('n1g_email')->unsigned()->nullable();
            $table->integer('n1g_post_code')->nullable();
            $table->tinyInteger('n2g')->nullable();
            $table->string('n2g_title')->nullable();
            $table->string('n2g_first_name')->nullable();
            $table->string('n2g_last_name')->nullable();
            $table->string('n2g_rel_with_ac_holder')->nullable();
            $table->integer('n2g_percentage')->nullable();
            $table->tinyInteger('n2g_residency')->nullable();
            $table->date('n2g_date_of_birth')->nullable();
            $table->string('n2g_nid')->nullable();
            $table->text('n2g_address')->nullable();
            $table->integer('n2g_city')->nullable();
            $table->string('n2g_post_code')->nullable();
            $table->string('n2g_division')->nullable();
            $table->string('n2g_country')->nullable();
            $table->string('n2g_mobile')->nullable();
            $table->string('n2g_tel')->nullable();
            $table->string('n2g_fax')->nullable();
            $table->string('n2g_email')->nullable();
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
        Schema::dropIfExists('bo_accounts');
    }
}
