<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuyMemberShipPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buy_member_ship_plans', function (Blueprint $table) {
            $table->id();
            $table->string('transaction_id');
            $table->float('amount');
            $table->unSignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unSignedBigInteger('member_ship_plan_id');
            $table->foreign('member_ship_plan_id')->references('id')->on('member_ship_plans');            
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
        Schema::dropIfExists('buy_member_ship_plans');
    }
}
