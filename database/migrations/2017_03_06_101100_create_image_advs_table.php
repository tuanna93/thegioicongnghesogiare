<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImageAdvsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image_advs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('image');
            $table->string('slug');
            $table->integer('position')->default(1);
            $table->string('content')->nullable();
            $table->integer('width')->default(0);
            $table->integer('height')->default(0);
            $table->integer('orders')->default(0);
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('image_advs');
    }
}
