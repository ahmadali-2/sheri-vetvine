<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
          $table->id();
            $table->unSignedBigInteger('child_of')->nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('profile_photo')->nullable();
            $table->string('referred_by')->nullable();
            $table->string('licence_no')->nullable();
            $table->tinyInteger('type')->nullable();
            $table->tinyInteger('status')->default(0)->comment("1 for  approve, 0 for unapprove");


            $table->unSignedBigInteger('network_id')->nullable();
            $table->foreign('network_id')->references('id')->on('user_member_and_network_levels');

            $table->unSignedBigInteger('timezone_id')->nullable();
            $table->foreign('timezone_id')->references('id')->on('time_zones');

            $table->unSignedBigInteger('locale_id')->nullable();
            $table->foreign('locale_id')->references('id')->on('locales');

            $table->integer('blocked_search')->nullable();
            $table->string('profile_privacy')->nullable();
            $table->string('profile_posting_privacy')->nullable();

            $table->string('provider')->nullable();
            $table->string('provider_id')->nullable();
            $table->string('social_profile_photo')->nullable();

            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('status_update_date')->nullable();
            $table->timestamp('last_status_update_date')->nullable();

            $table->enum('is_searchable', ['0','1'])->default('1');
            $table->enum('is_show_profileviewers', ['0','1'])->default('1');
            $table->enum('invites_other_users', ['0','1'])->default('1');
            $table->enum('is_invitable', ['0','1'])->default('1');

            $table->timestamp('last_login_date')->nullable();
            $table->timestamp('last_update_date')->nullable();

            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('credits_left')->nullable();
            $table->string('creation_ip')->nullable();
            $table->string('last_login_ip')->nullable();

            $table->rememberToken();
            $table->softDeletes();
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
        Schema::dropIfExists('users');
    }
}
