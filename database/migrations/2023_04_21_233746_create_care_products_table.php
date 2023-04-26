<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCareProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('care_products', function (Blueprint $table) {
            $table->foreignId("care_id");
            $table->foreign("care_id")
                ->references("id")
                ->on("cares")
                ->onDelete("cascade");
            $table->foreignId("product_id");
            $table->foreign("product_id")
                ->references("id")
                ->on("products")
                ->onDelete("cascade");
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
        Schema::dropIfExists('care_products');
    }
}
