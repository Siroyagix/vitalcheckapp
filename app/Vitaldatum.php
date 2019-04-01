<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vitaldatum extends Model
{
    //モデルと関連しているテーブル
    protected $table = 'vitaldata';
    protected $guarded = array('id');

    public static $rules = array(
        '日付'=>'date',
        '体温'=>'digits_between:30,50',
        '脈拍'=>'digits_between:10,200',
        '収縮期血圧'=>'digits_between:10,250',
        '拡張期血圧'=>'digits_between:10,200',
        '排泄量'=>'string',
        '便の性状'=>'string',
        'フリーコメント'=>'string',
        
    );
}
