<?php

namespace App\Http\Controllers;

use App\Vitaldatum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VitaldatumController extends Controller
{
    public function create(Request $request)
    {
        return view('vitaldatum.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, Vitaldatum::$rules);
        $vitaldatum = new Vitaldatum();
        $user = ['user_id' => Auth::id()];
        $form = $request->all();
        $form = array_merge($form,$user);
        unset($request['_token']);
        $vitaldatum->fill($form)->save();
        return redirect()->route('home');
    }
}
