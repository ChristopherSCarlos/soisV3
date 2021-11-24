<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrgSocialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('org_socials', function (Blueprint $table) {
            $table->id('org_socials_id');

            $table->unsignedBigInteger('organization_id')->nullable();
            $table->foreign('organization_id')->references('organizations_id')->on('organizations');

            $table->unsignedBigInteger('social_id')->nullable();
            $table->foreign('social_id')->references('social_media_id')->on('social_media');

            $table->string('org_social_link');

            $table->boolean('status');

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
        Schema::dropIfExists('org_socials');
    }
}
