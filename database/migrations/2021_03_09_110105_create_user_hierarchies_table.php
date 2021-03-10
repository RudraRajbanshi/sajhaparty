<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserHierarchiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_hierarchies', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->uuid('user_id')->unique();
            $table->foreign('user_id')->references('user_code')->on('users');

            $table->uuid('hierarchy_id');
            $table->foreign('hierarchy_id')->references('hierarchy_id')->on('hierarchies');

            $table->string('access_location_id')->nullable(); //references on any location

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
        Schema::dropIfExists('user_hierarchies');
    }
}
