<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagArticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tag_article', function (Blueprint $table) {
            $table->integer('tag_id')->unsigned()->nullable();
            $table->foreign('tag_id')->references('id')
                  ->on('tags')->onDelete('cascade');

            $table->integer('article_id')->unsigned()->nullable();
            $table->foreign('article_id')->references('id')
                  ->on('articles')->onDelete('cascade');

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
        Schema::dropIfExists('tag_article');
    }
}
