<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_permissions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('membertype_id');
            $table->foreign('membertype_id')->references('id')->on('member_types')->onDelete('cascade');
            $table->enum('view_ads', ['0', '1'])->default(0);
            $table->enum('comments', ['0', '1'])->default(0);
            $table->enum('licensure', ['0', '1'])->default(0);
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
        Schema::dropIfExists('member_permissions');
    }
}
