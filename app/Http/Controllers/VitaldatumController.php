<?php

namespace App\Http\Controllers;

use App\Vitaldatum;
use Illuminate\Http\Request;

class VitaldatumController extends Controller
{
    public function fill(Request $request)
    {
        return view('fillrecord');
    }

    public function create(Request $request)
    {
        $this->validate($request, Vitaldatum::$rules);
        $vitaldatum = new Vitaldatum();
        $form = $request->all();
        unset($form['_token']);
        $vitaldatum->fill($form)->save();
        return redirect('/fillrecord');
    }
}
