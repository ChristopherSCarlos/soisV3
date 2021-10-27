<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->boolean('is_default_home')->nullable()->after('pages_id');
            $table->boolean('is_default_not_found')->nullable()->after('is_default_home'); 
            $table->string('primary_color')->nulllable();
            $table->string('secondary_color')->nulllable();
            $table->string('tertiary_color')->nulllable();
            $table->string('quarternary_color')->nulllable();
            $table->integer('status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pages', function (Blueprint $table) {
            //
        });
    }
}
