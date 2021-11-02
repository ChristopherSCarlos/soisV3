<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_assets', function (Blueprint $table) {
            $table->id('system_assets_id');
            
            $table->unsignedBigInteger('asset_type_id');
            $table->foreign('asset_type_id')->references('asset_types_id')->on('asset_types');

            $table->string('asset_name');
            $table->integer('is_latest_logo');
            $table->integer('is_latest_banner');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('users_id')->on('users');

            $table->unsignedBigInteger('page_type_id');
            $table->foreign('page_type_id')->references('page_types_id')->on('page_types');

            $table->unsignedBigInteger('organization_id');
            $table->foreign('organization_id')->references('organizations_id')->on('organizations');            


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
        Schema::dropIfExists('system_assets');
    }
}
