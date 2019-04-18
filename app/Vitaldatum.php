<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vitaldatum extends Model
{
    //モデルと関連しているテーブル
    protected $table = 'vitaldata';
    protected $guarded = array('id');

    public static $rules = array(
        'date'=>'nullable|date',
        'bodytemperature'=>'nullable|numeric|min:30|max:50',
        'pulse'=>'nullable|integer|min:10|max:200',
        'systolicbp'=>'nullable|integer|min:10|max:250',
        'diastlicbp'=>'nullable|integer|min:10|max:200',
        'excretion'=>'nullable|string',
        'stoolform'=>'nullable|string',
        'freecomments'=>'nullable|string',
        
    );

    public function user()
    {
        return $this->belongsTo('\App\User');
    }
}
