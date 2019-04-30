<?php

namespace App\Http\Controllers;

use App\Vitaldatum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateUserRequest;

class VitaldatumController extends Controller
{
    public function create(Request $request)
    {
        $excretions = config('excretion');
        $stoolforms = config('stoolform');
        $today = date("Y-m-d");
        return view('vitaldatum.create',compact('today'))->with(['excretions' => $excretions,'stoolforms' => $stoolforms]);
    }

    public function store(CreateUserRequest $request)
    {
        $vitaldatum = new Vitaldatum();
        $form = $request->all();
        $form['user_id'] = Auth::id(); 
        unset($request['_token']);
        $vitaldatum->fill($form)->save();
        return redirect()->route('home');
    }

    public function edit(Request $request,Vitaldatum $vitaldatum)
    {
        $excretions = config('excretion');
        $stoolforms = config('stoolform');
        return view('vitaldatum.edit')
         ->with(['vitaldatum' => $vitaldatum,'excretions' => $excretions,'stoolforms' => $stoolforms]);
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
