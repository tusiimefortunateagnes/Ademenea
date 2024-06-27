<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('Consignments', function (Blueprint $table) {
            $table->id('consignment_id');
            $table->unsignedBigInteger('vendor_id');
            $table->foreign('vendor_id')->references('vendor_id')->on('vendors');
            $table->string('receiptNo');
            $table->timestamp('DateBought')->nullable();
            $table->timestamp('DateReceived')->nullable();
            $table->string('receipt_image_url');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('Consignments');
    }
};
