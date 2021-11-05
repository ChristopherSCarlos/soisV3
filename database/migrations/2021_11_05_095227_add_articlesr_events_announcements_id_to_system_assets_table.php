<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddArticlesrEventsAnnouncementsIdToSystemAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('system_assets', function (Blueprint $table) {
            $table->unsignedBigInteger('events_id')->nullable();
            $table->foreign('events_id')->references('event_id')->on('events');

            $table->unsignedBigInteger('announcement_id')->nullable();
            $table->foreign('announcement_id')->references('announcements_id')->on('announcements');

            $table->unsignedBigInteger('articles_id')->nullable();
            $table->foreign('articles_id')->references('articles_id')->on('articles');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('system_assets', function (Blueprint $table) {
            //
        });
    }
}
