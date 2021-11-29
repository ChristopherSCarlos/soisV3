<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganizationsUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organizations_users', function (Blueprint $table) {
            $table->id('organizations_users_id');

            $table->unsignedBigInteger('organization_id')->nullable();
            $table->foreign('organization_id')->references('organizations_id')->on('organizations');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('users_id')->on('users');

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
        Schema::dropIfExists('organizations_users');
    }
}
