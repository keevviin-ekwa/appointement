<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_number');
            $table->dateTime('date');
            $table->double("amount");
            $table->double('tva');
            $table->string("address")->nullable();
            $table->foreignId("payment_id");
            $table->foreignId("service_id");
            $table->foreign("payment_id")->references("id")->on("payments")->onDelete("cascade");
            $table->foreign("service_id")->references("id")->on("services")->onDelete("cascade");
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
        Schema::dropIfExists('invoices');
    }
}
