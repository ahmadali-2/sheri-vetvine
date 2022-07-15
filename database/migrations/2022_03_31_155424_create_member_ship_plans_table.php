<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberShipPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_ship_plans', function (Blueprint $table) {
            $table->id();
            $table->string('plan_name');
            $table->longText('plan_description');
            $table->longText('plan_features');
            $table->float('plan_price');
            $table->date('expiry_date');
            $table->unSignedBigInteger('network_id')->nullable();
            $table->foreign('network_id')->references('id')->on('user_member_and_network_levels');
            $table->unSignedBigInteger('member_ship_plan_categories_id')->nullable();
            $table->foreign('member_ship_plan_categories_id')->references('id')->on('member_ship_plan_categories');

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
        Schema::dropIfExists('member_ship_plans');
    }
}
