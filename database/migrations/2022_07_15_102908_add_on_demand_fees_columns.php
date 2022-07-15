<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOnDemandFeesColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('videos_on_demands', function (Blueprint $table) {
            $table->integer('vet_pet_prof_fee')->default(0);
            $table->integer('pet_owner_premium_fee')->default(0);
            $table->integer('pet_owner_fee')->default(0);
            $table->integer('vet_pet_prof_premium_fee')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
