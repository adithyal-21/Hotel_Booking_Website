<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExtadatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('extadatas', function (Blueprint $table) {
            $table->id();
            $table->string('hotel')->nullable();
            $table->string('days')->nullable();
            $table->string('rooms')->nullable();
            $table->string('timings')->nullable();
            $table->string('amount')->nullable();
            $table->integer('status')->nullable();
          
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
        Schema::dropIfExists('extadatas');
    }
}
