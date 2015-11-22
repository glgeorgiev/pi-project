<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Initial extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function(Blueprint $table) {
            $table->boolean('is_admin')->default(false);
            $table->string('avatar_ext')->nullable();
        });

        Schema::create('images', function(Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('ext');
            $table->timestamps();
        });

        Schema::create('sections', function(Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description');
            $table->integer('image_id')->unsigned();
            $table->tinyInteger('order')->unsigned();
            $table->timestamps();

            $table->foreign('image_id')->references('id')->on('images')
                ->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('tags', function(Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description');
            $table->integer('image_id')->unsigned();
            $table->timestamps();

            $table->foreign('image_id')->references('id')->on('images')
                ->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('polls', function(Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description');
            $table->boolean('show_in_sidebar')->default(false);
            $table->timestamps();
        });

        Schema::create('poll_answers', function(Blueprint $table) {
            $table->increments('id');
            $table->string('answer');
            $table->integer('poll_id')->unsigned();
            $table->timestamps();

            $table->foreign('poll_id')->references('id')->on('polls')
                ->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('poll_votes', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('ip')->unsigned();
            $table->integer('poll_id')->unsigned();
            $table->integer('poll_answer_id')->unsigned();
            $table->timestamps();

            $table->foreign('poll_id')->references('id')->on('polls')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('poll_answer_id')->references('id')->on('poll_answers')
                ->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('articles', function(Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('description');
            $table->text('content');
            $table->integer('views')->unsigned();
            $table->integer('likes')->unsigned();
            $table->integer('dislikes')->unsigned();
            $table->integer('section_id')->unsigned();
            $table->timestamps();

            $table->foreign('section_id')->references('id')->on('sections')
                ->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('article_tag', function(Blueprint $table) {
            $table->integer('article_id')->unsigned();
            $table->integer('tag_id')->unsigned();
            $table->timestamps();

            $table->primary(['article_id', 'tag_id']);

            $table->foreign('article_id')->references('id')->on('articles')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('tag_id')->references('id')->on('tags')
                ->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('comments', function(Blueprint $table) {
            $table->increments('id');
            $table->text('comment');
            $table->integer('article_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->timestamps();

            $table->foreign('article_id')->references('id')->on('articles')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('menus', function(Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('url');
            $table->tinyInteger('order')->unsigned();
            $table->timestamps();
        });

        Schema::create('ban_emails', function(Blueprint $table) {
            $table->increments('id');
            $table->string('email');
            $table->timestamp('until')->nullable();
            $table->timestamps();
        });

        Schema::create('ban_ips', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('ip')->unsigned();
            $table->timestamp('until')->nullable();
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
        Schema::drop('ban_ips');
        Schema::drop('ban_emails');
        Schema::drop('menus');
        Schema::drop('comments');
        Schema::drop('article_tag');
        Schema::drop('articles');
        Schema::drop('poll_votes');
        Schema::drop('poll_answers');
        Schema::drop('polls');
        Schema::drop('tags');
        Schema::drop('sections');
        Schema::drop('images');

        Schema::table('users', function(Blueprint $table) {
            $table->dropColumn('is_admin');
            $table->dropColumn('avatar_ext');
        });
    }
}
