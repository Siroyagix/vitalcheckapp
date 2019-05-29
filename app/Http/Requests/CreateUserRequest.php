<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\request;

/*新規ユーザーのバリデーションを行うクラス*/

class CreateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    /**
     * 認証関係の判定を行う場合はここに処理を記述する。
     * 特にない場合は常にtrueを返しておく。
     */ 
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'date'=>'nullable|date',
            'bodytemperature'=>'nullable|numeric|min:30|max:50',
            'pulse'=>'nullable|integer|min:10|max:200',
            'systolicbp'=>'nullable|integer|min:10|max:250',
            'diastlicbp'=>'nullable|integer|min:10|max:200',
            'excretion'=>'nullable|string',
            'stoolform'=>'nullable|string',
            'freecomments'=>'nullable|string|max:150',
        ];
    }
}
