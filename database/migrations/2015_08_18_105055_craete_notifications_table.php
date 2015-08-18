<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CraeteNotificationsTable extends Migration
{

        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('notifications', function(Blueprint $tbl){
                $tbl->increments('id');
                $tbl->string('messages', 150);
                $tbl->string('link', 100);
                $tbl->string('image', 150);
                $tbl->boolean('status');
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
            Schema::drop('notifications');
        }
}
