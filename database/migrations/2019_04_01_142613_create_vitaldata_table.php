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
        Schema::table('vitaldata', function (Blueprint $table) {
            $table->interger('id');
            $table->interger('日付');
            $table->interger('体温');
            $table->interger('脈拍');
            $table->interger('収縮期血圧');
            $table->interger('拡張期血圧');
            $table->text('排泄量');
            $table->text('便の性状');
            $table->text('フリーコメント');
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
