<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideosOnDemandsSponserTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos_on_demands_sponser_tables', function (Blueprint $table) {
            $table->unsignedBigInteger('video_id')->nullable();
            $table->foreign('video_id')->references('id')->on('videos_on_demands')->onDelete('cascade');
            $table->unsignedBigInteger('sponsers_id')->nullable();
            $table->foreign('sponsers_id')->references('id')->on('sponser_tables')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('videos_on_demands_sponser_tables', function (Blueprint $table) {
            //
        });
    }
}
