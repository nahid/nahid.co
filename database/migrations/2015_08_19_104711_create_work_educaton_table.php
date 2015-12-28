<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkEducatonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_education', function(Blueprint $tbl){
            $tbl->increments('id');
            $tbl->string('institute', 150);
            $tbl->string('address', 250);
            $tbl->string('period', 20);
            $tbl->string('section', 60);
            $tbl->text('note');
            $tbl->boolean('type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('work_education');
    }
}
