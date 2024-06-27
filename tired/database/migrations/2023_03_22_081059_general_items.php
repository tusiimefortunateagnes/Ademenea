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
        Schema::create('GeneralItems', function (Blueprint $table) {
            $table->id('item_id');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('category_id')->on('Categories');
            $table->unsignedBigInteger('compartment_id');
            $table->foreign('compartment_id')->references('compartment_id')->on('Compartments');
            $table->unsignedBigInteger('consignment_id');
            $table->foreign('consignment_id')->references('consignment_id')->on('Consignments');
            $table->string('name');
            $table->string('Type')->nullable();
            $table->string('Quantity');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('GeneralItems');
    }
};
