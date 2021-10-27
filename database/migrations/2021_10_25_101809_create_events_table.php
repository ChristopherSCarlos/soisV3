<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id('event_id');
            $table->string('semester')->nullable();
            $table->string('school_year')->nullable();
            $table->string('course')->nullable();
            $table->string('organization')->nullable();
            $table->date('date')->nullable();
            $table->time('time', $precision = 0)->nullable();
            $table->string('name_of_activity')->nullable();
            $table->string('objectives')->nullable();
            $table->integer('participants')->nullable();
            $table->string('sponsor')->nullable();
            $table->string('venue')->nullable();
            $table->string('type_of_activity')->nullable();
            $table->string('projected_budget',$precision = 8, $scale = 2)->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
            $table->timestamp('deleted_at',$precision = 0)->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('users_id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
