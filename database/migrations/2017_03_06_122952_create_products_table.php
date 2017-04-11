<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug');
            $table->string('code')->nullable();
            $table->integer('price_new')->default(0);
            $table->integer('price_old')->default(0);
            $table->text('intro')->nullable();
            $table->longText('content')->nullable();
            $table->string('image')->nullable();
            $table->integer('cate_id')->unsigned()->default(0);
            $table->foreign('cate_id')->references('id')->on('categories')->onDelete('cascade');;
            $table->string('keywords')->nullable();
            $table->string('description')->nullable();
            $table->integer('orders')->default(0);
            $table->integer('status_sale')->default(0);
            $table->boolean('is_selling')->default(0);
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('products');
    }
}
