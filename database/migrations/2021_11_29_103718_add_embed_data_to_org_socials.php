<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEmbedDataToOrgSocials extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('org_socials', function (Blueprint $table) {
            $table->string('embed_data')->nullable();

            $table->unsignedBigInteger('social_id')->nullable();
            $table->foreign('social_id')->references('social_media_id')->on('social_media');
            
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('org_socials', function (Blueprint $table) {
            //
        });
    }
}
