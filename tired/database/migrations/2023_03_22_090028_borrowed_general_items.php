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
        Schema::create('BorrowedGeneralItems', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('item_id');
            $table->foreign('item_id')->references('item_id')->on('GeneralItems');
            $table->unsignedBigInteger('borrow_id');
            $table->foreign('borrow_id')->references('borrow_id')->on('Borrow');
            $table->string('quantity');
            $table->string('status')->default("not returned");
            $table->timestamp('ReturnDate')->nullable();
            $table->string('comment')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('BorrowedGeneralItems');
    }
};