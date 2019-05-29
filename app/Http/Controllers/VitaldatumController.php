<?php

namespace App\Http\Controllers;

use App\Vitaldatum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateUserRequest;

class VitaldatumController extends Controller
{
    /**
     * バイタルデータ新規登録画面
     * @param Request $request
     * @return View
     */
    public function create(Request $request)
    {
        $excretions = config('excretion');
        $stoolforms = config('stoolform');
        return view('vitaldatum.create')->with([
            'today' => date("Y-m-d"),
            'vitaldatum' => new Vitaldatum(),
            'excretions' => $excretions,
            'stoolforms' => $stoolforms
        ]);
    }

   

      

    /**
     * バイタルデータ新規登録画面
     * @param CreateUserRequest $request
     * @return void
     */
    public function store(CreateUserRequest $request)
    {
        $vitaldatum = new Vitaldatum();
        $form = $request->all();
        $form['user_id'] = Auth::id(); 
        unset($request['_token']);
        $vitaldatum->fill($form)->save();
        return redirect()->route('home');
    }

    public function edit(Request $request, Vitaldatum $vitaldatum)
    {
        $excretions = config('excretion');
        $stoolforms = config('stoolform');
        return view('vitaldatum.edit')->with([
            'vitaldatum' => $vitaldatum, 
            'excretions' => $excretions,
            'stoolforms' => $stoolforms
        ]);
    }

    public function update(CreateUserRequest $request,Vitaldatum $vitaldatum)
    {
        $parameter = $request->all();
        unset($request['_token']);
        $vitaldatum->fill($parameter)->save();
        return redirect()->route('home');
    }

    public function destroy(Request $request,Vitaldatum $vitaldatum)
    {
        $vitaldatum->delete();
        return redirect()->route('home');
    }

}
