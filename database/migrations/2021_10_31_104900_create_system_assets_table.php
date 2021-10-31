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
            $table->string('asset_type');
            $table->string('asset_name');
            $table->string('is_latest_logo');
            $table->string('is_latest_banner');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('users_id')->on('users');

            $table->unsignedBigInteger('page_type_id');
            $table->foreign('page_type_id')->references('page_types_id')->on('page_types');            


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
