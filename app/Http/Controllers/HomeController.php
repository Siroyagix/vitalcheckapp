<?php

namespace App\Http\Controllers;

use App\Vitaldatum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    public function index()
    {
        $userid = Auth::id();
        $items = Vitaldatum::where('user_id',$userid)->get();
        return view('home', ['items' => $items]);
    }

}
