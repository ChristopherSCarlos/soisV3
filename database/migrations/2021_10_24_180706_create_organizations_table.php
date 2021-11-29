<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organizations', function (Blueprint $table) {
            $table->id('organizations_id');

            $table->string('organization_name');
            $table->string('organization_logo');
            $table->string('organization_details');
            $table->string('organization_primary_color');
            $table->string('organization_secondary_color');

            $table->string('organization_slug');
            $table->string('page_type')->default('organizations');
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
        Schema::dropIfExists('organizations');
    }
}
