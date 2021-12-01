<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table){
            $table->increments('id');

            $table->integer('author_id')->unsigned();

            $table->integer('thumbnail_id')->unsigned()->nullable();

            $table->string('title');
            $table->longText('content');
            $table->string('slug');
            $table->boolean('published')->default(0);

            $table->timestamp('posted_at');
            $table->timestamps();
        });

        Schema::table('posts', function($table) {
            $table->foreign('author_id')->references('id')->on('users');
            $table->foreign('thumbnail_id')->references('id')->on('images');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table)
        {
            $table->dropForeign('posts_user_id_foreign');
            $table->dropColumn(['user_id']);
        });
    }
}
