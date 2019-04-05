<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vitaldatum extends Model
{
    //モデルと関連しているテーブル
    protected $table = 'vitaldata';
    protected $guarded = array('id');

    public static $rules = array(
        'date'=>'date',
        'bodytemperature'=>'digits_between:30,50',
        'pulse'=>'digits_between:10,200',
        'systolicbp'=>'digits_between:10,250',
        'diastlicbp'=>'digits_between:10,200',
        'excretion'=>'string',
        'stoolform'=>'string',
        'freecomments'=>'string',
        
    );
}
