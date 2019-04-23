<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vitaldatum extends Model
{
    //モデルと関連しているテーブル
    protected $table = 'vitaldata';
    protected $guarded = array('id');

         
    

    public function user()
    {
        return $this->belongsTo('\App\User');
    }
}
