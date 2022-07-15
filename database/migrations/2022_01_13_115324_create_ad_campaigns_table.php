<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdCampaignsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ad_campaigns', function (Blueprint $table) {
           $table->id();
            $table->string('campaign_name');
            $table->date('start_date')->nullable();
            $table->enum('is_end_on_specific_date', ['0', '1'])->comment('0.unlimited,1.end on specific date')->default('0');
            $table->date('end_date')->nullable();
            $table->bigInteger('total_views_allowed');
            $table->bigInteger('total_clicks_allowed');
            $table->bigInteger('min_ctr')->nullable();
            $table->unSignedBigInteger('member_level_id')->nullable();
            $table->unSignedBigInteger('network_id')->nullable();
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
        Schema::drop('ad_campaigns');
    }
}
