<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vitaldatum extends Model
{
    protected $table = 'vitaldata';
    protected $guarded = array('id');

         
    

    /**
     * ユーザー情報テーブルとの関連付け
     *
     * @return void
     */
    public function user()
    {
        return $this->belongsTo('\App\User');
    }

}
