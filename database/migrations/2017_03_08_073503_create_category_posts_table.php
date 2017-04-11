<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('slug');
            $table->integer('order')->default(0);
            $table->string('icon')->nullable();
            $table->integer('parent_id');
            $table->text('keywords')->nullable();
            $table->text('description')->nullable();
            $table->integer('sort_order')->default(0);
            $table->boolean('is_menu')->default(1);
            $table->boolean('is_tab')->default(0);
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
        Schema::dropIfExists('category_posts');
    }
}
