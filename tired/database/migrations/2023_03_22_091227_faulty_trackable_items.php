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
        Schema::create('FaultyTrackableItems', function (Blueprint $table) {
            $table->id('faultytrackable_id');
            $table->string('SerialNo');
            $table->foreign('SerialNo')->references('SerialNo')->on('TrackableItems');
            $table->unsignedBigInteger('borrow_id');
            $table->foreign('borrow_id')->references('borrow_id')->on('Borrow');
            $table->timestamp('FaultDate');
            $table->string('FaultDescription');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('FaultyTrackableItems');
    }
};
