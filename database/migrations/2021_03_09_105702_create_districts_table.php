<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDistrictsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('districts', function (Blueprint $table) {
            $table->increments('id');

            $table->string('district_code')->unique();

            $table->string('name')->unique();

            $table->string('status')->default('active');

            $table->string('remarks')->nullable();

            $table->unsignedInteger('province_id');

            $table->foreign('province_id', 'province_fk_id')->references('id')->on('provinces');

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
        Schema::dropIfExists('districts');
    }
}
