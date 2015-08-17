<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function(Blueprint $tbl){
            $tbl->increments('id');
            $tbl->text('comment');
            $tbl->boolean('status');
            $tbl->integer('diary_id')->references('id')->on('diary');
            $tbl->integer('user_id')->references('id')->on('users');
            $tbl->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('comments');
    }
}
