<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_addresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('member_id');

            $table->foreign('member_id')->references('id')->on('members');
            $table->string('province_id')->nullable();
            $table->string('municipality_id')->nullable();
            $table->string('district_id')->nullable();
            $table->string('ward_no')->nullable();
            $table->string('toll_no')->nullable();
            $table->string('membership_code')->nullable();
            $table->foreign('membership_code')->references('membership_code')->on('members')->onDelete('cascade');
            $table->string('address_type');
            $table->string('remarks')->nullable();
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
        Schema::dropIfExists('member_addresses');
    }
}
