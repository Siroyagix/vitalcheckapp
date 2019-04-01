<?php

namespace App\Http\Controllers;

use App\Vitaldatum;
use Illuminate\Http\Request;

class VitaldatumController extends Controller
{
    public function index(Request $request)
    {
        $items = Vitaldatum::all();
        return view('home', ['items' => $items]);
    }
}
