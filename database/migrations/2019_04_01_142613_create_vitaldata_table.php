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
            $table->decimal('bodytemperature',3,1)->nullable()->comment('体温');
            $table->integer('pulse')->nullable()->comment('脈拍');
            $table->integer('systolicbp')->nullable()->comment('収縮期血圧');
            $table->integer('diastlicbp')->nullable()->comment('拡張期血圧');
            $table->text('excretion')->nullable()->comment('排泄量');
            $table->text('stoolform')->nullable()->comment('便の性状');
            $table->text('freecomments')->nullable()->comment('フリーコメント');
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
