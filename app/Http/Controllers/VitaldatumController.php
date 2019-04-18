<?php

namespace App\Http\Controllers;

use App\Vitaldatum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VitaldatumController extends Controller
{
    public function create(Request $request)
    {
        $excretions = config('excretion');
        $stoolforms = config('stoolform');
        return view('vitaldatum.create')->with(['excretions' => $excretions,'stoolforms' => $stoolforms]);
    }

    public function store(Request $request)
    {
        $this->validate($request, Vitaldatum::$rules);
        $vitaldatum = new Vitaldatum();
        $form = $request->all();
        $form['user_id'] = Auth::id(); 
        unset($request['_token']);
        $vitaldatum->fill($form)->save();
        return redirect()->route('home');
    }

}
