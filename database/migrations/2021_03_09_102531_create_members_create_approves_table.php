<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersCreateApprovesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members_create_approves', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->uuid('case_id')->unique();

            $table->uuid('created_by_user_id');
            $table->foreign('created_by_user_id')->references('user_code')->on('users');

            $table->uuid('member_id')->unique();
            $table->foreign('member_id')->references('membership_code')->on('members');

            $table->uuid('approved_by_user_id')->nullable();
            $table->foreign('approved_by_user_id')->references('user_code')->on('users');

            $table->dateTime('approved_at')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('members_create_approves');
    }
}
