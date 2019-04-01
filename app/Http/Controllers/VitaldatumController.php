<?php

namespace App\Http\Controllers;

use App\Vitaldatum;
use Illuminate\Http\Request;

class VitaldatumController extends Controller
{
    public function showtable(Request $request)
    {
        $items = Vitaldatum::all();
        return view('home', ['items' => $items]);
    }

   
    public function create(Request $request)
    {
        $this->validate($request, Vitaldatum::$rules);
        $vitaldatum = new Vitaldatum;
        $form = $request->all();
        unset($form['_token']);
        $vitaldatum->fill($form)->save();
        return redirect('/fillrecord');
    }
}
