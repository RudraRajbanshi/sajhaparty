<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->increments('id');
            $table->string('membership_code')->unique()->nullable();
            $table->string('name')->nullable();
            $table->string('nepali_name')->nullable();
            $table->string('email')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->string('gender')->nullable();
            $table->string('mobile')->nullable();
            $table->string('area_code')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('current_country')->nullable();
            $table->string('highest_academic_qualification')->nullable(); //qualification
            $table->string('disability')->nullable();

            $table->string('group')->nullable();
            $table->string('occupation')->nullable();
            $table->string('area_of_efficiency')->nullable();
            $table->string('interested_department')->nullable();
            $table->string('identity_type')->nullable();
            $table->string('identity_image')->nullable(); //image for id
            $table->string('photo_for_id_card')->nullable(); //photo for id card
            $table->string('identity_number')->nullable();

            $table->string('availability')->nullable();
            $table->decimal('membership_fee', 15, 2)->nullable();
            $table->string('help_type')->nullable();
            $table->string('help_goods')->nullable();
            $table->decimal('help_money', 15, 2)->nullable();
            $table->string('currency')->nullable();
            $table->string('payment_type')->nullable();
            $table->string('payment_confirmation_code')->nullable();
            $table->string('is_paid')->nullable();
            $table->string('status')->nullable();
            $table->string('remarks')->nullable();

            $table->boolean('is_agreed')->default(false)->nullable(); //agreed or not
            $table->boolean('is_approved')->default(false)->nullable(); //agreed or not
            $table->timestamp('membership_approve_date')->nullable();
            $table->string('year_of_membership_period')->nullable();
            $table->string('form_approve_date')->nullable();
            $table->string('membership_form')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members');
    }
}
