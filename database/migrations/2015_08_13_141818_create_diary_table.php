<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiaryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diary', function($tbl){
            $tbl->increments('id');
            $tbl->string('title', 300);
            $tbl->text('note');
            $tbl->string('featured_image', 100)->nullable();
            $tbl->tinyInteger('status');
            $tbl->integer('category_id');
            $tbl->integer('user_id');
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
        Schema::drop('diary');
    }
}
