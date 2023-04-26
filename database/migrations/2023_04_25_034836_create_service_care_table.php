<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceCareTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('care_service', function (Blueprint $table) {

            $table->foreignId('service_id');

            $table->foreign('service_id')->references('id')->on('services');

            $table->foreignId('care_id')->nullable();

            $table->foreign('care_id')->references('id')->on('cares');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_care');
    }
}
