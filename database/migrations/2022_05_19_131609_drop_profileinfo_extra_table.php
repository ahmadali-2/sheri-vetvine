<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropProfileinfoExtraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('skill_and_expertises');
        Schema::dropIfExists('user_skills_and_expertises');
        Schema::dropIfExists('education');
        Schema::dropIfExists('education_school_names');
        Schema::dropIfExists('user_education');
        Schema::dropIfExists('user_education_degrees');
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
