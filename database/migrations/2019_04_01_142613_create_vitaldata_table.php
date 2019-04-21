<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVitaldataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vitaldata', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->date('date')->comment('日付');
            $table->integer('bodytemperature')->comment('体温');
            $table->integer('pulse')->comment('脈拍');
            $table->integer('systolicbp')->comment('収縮期血圧');
            $table->integer('diastlicbp')->comment('拡張期血圧');
            $table->text('excretion')->comment('排泄量');
            $table->text('stoolform')->comment('便の性状');
            $table->text('freecomments')->comment('フリーコメント');
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
        Schema::dropIfExists('vitaldata');
    }
}
