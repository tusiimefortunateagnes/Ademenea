<?php

use App\Models\category;
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
        Schema::create('Categories', function (Blueprint $table) {
            $table->id('category_id');
            $table->string('category_name');
            $table->text('description');
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('Categories');
    }
};