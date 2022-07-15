<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->unSignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('category_events')->onDelete('cascade');
            $table->unSignedBigInteger('sponser_id')->nullable();
            $table->foreign('sponser_id')->references('id')->on('sponser_tables')->onDelete('cascade');
            $table->string('event_title');
            $table->string('tags');
            $table->string('main_photo')->nullable();
            $table->string('event_add_ytlink')->nullable();
            $table->date('date')->nullable();
            $table->time('time')->nullable();
            $table->string('presenter_one')->nullable();
            $table->string('presenter_one_url')->nullable();
            $table->string('presenter_two')->nullable();
            $table->string('presenter_two_url')->nullable();
            $table->string('presenter_three')->nullable();
            $table->string('presenter_three_url')->nullable();
            $table->longText('event_description');
            $table->integer('vet_pet_prof_fee')->nullable();;
            $table->integer('pet_owner_premium_fee')->nullable();;
            $table->integer('pet_owner_fee')->nullable();;
            $table->integer('vet_pet_prof_premium_fee')->nullable();;
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
        Schema::dropIfExists('events');
    }
}
