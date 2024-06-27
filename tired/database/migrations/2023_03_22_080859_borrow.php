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
        Schema::create('Borrow', function (Blueprint $table) {
            $table->id('borrow_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('user_id')->on('Users');
            $table->dateTime('borrowDate');
            $table->dateTime('ExpectedReturnDate');
            $table->string('reason');
            $table->string('borrow_status')->default('not returned');
            $table->string('borrow_image_url');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('Borrow');
    }
};