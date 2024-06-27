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
        Schema::create('BorrowedTrackableItems', function (Blueprint $table) {
            $table->id('borrowedtrackable_id');
            $table->string('SerialNo');
            $table->foreign('SerialNo')->references('SerialNo')->on('TrackableItems');
            $table->unsignedBigInteger('borrow_id');
            $table->foreign('borrow_id')->references('borrow_id')->on('Borrow');
            $table->string('status')->default("not returned");
            $table->timestamp('ReturnDate')->nullable();
            $table->string('comment')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('BorrowedTrackableItems');
    }
};