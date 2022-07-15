<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideosOnDemandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos_on_demands', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned();
            $table->string('video_title');
            $table->longtext('video_description')->nullable();
            $table->text('video_link')->nullable();
            $table->text('post_add_video')->nullable();
            $table->text('presented_by')->nullable();
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
        Schema::dropIfExists('videos_on_demands');
    }
}
