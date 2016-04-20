<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function($tbl){
            $tbl->increments('id');
            $tbl->string('name', 40);
            $tbl->string('email', 60);
            $tbl->string('image', 200);
            $tbl->text('message');
            $tbl->boolean('status');
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
        Schema::drop('messages');
    }
}
