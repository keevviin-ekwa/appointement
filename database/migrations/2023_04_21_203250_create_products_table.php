<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->text("libelle");
            $table->text("description")->nullable();
            $table->integer("quantity")->default(0);
            $table->integer("quantityMin");
            $table->integer("price");
            $table->foreignId("product_type_id");
            $table->foreign("product_type_id")
                ->references("id")
                ->on("product_types")
                ->onDelete("cascade");
                $table->foreignId("provider_id");
            $table->foreign("provider_id")
                ->references("id")
                ->on("providers")
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
        Schema::dropIfExists('products');
    }
}
