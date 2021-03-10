<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMunicipalitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('municipalities', function (Blueprint $table) {
            $table->increments('id');

            $table->string('municipality_code');

            $table->string('slug');

            $table->string('name');

            $table->integer('wards')->default(0);

            $table->integer('district_id')->unsigned();

            $table->foreign('district_id')->references('id')->on('districts');

            $table->string('status')->default('active');

            $table->string('remarks')->nullable();

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
        Schema::dropIfExists('municipalities');
    }
}
