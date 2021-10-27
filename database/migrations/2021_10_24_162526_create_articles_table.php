<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id('articles_id');
            $table->string('article_title');
            $table->string('article_subtitle');
            $table->string('article_content');

            $table->integer('type')->nullable();
            $table->string('image')->nullable();
            $table->integer('status')->nullable();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('users_id')->on('users');

            $table->string('article_slug');

            $table->boolean('is_featured_in_newspage')->nullable();

            $table->boolean('is_article_featured_landing_page')->nullable();

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
        Schema::dropIfExists('articles');
    }
}
