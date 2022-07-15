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
            $table->string('post_title');
            $table->string('post_photo')->nullable();
            $table->text('post_description')->nullable();
            $table->text('post_link')->nullable();
            $table->string('post_add_ytlink')->nullable();
            $table->text('post_add_vimeolink')->nullable();
            $table->text('post_add_video')->nullable();
            $table->enum('status', ['0', '1'])->comment('0.disable,1.enable')->default('1');
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
