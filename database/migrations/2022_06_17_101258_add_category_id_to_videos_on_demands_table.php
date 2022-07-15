<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCategoryIdToVideosOnDemandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('videos_on_demands', function (Blueprint $table) {
            $table->bigInteger('category_id');
        });
    }

    /**cate
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('videos_on_demands', function (Blueprint $table) {
            //
        });
    }
}
