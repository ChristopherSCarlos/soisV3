<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganizationOfficerPositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organization_officer_positions', function (Blueprint $table) {
            $table->id('organization_officer_positions_id');
            $table->string('officer_position_name');
            $table->unsignedBigInteger('organization_id')->nullable();
            $table->foreign('organization_id')->references('organizations_id')->on('organizations');
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
        Schema::dropIfExists('organization_officer_positions');
    }
}
