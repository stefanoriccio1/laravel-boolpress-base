<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {

          $table->id();
          $table->unsignedBigInteger('user_id');
          $table->foreign('user_id')
                ->references('id')
                ->on('users');
          $table->char('title', 100);
          $table->char('content', 200);
          $table->char('slug', 100);
          $table->char('author', 200);
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
        Schema::dropIfExists('posts');
    }
}
