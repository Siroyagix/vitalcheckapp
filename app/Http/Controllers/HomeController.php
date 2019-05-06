<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


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
        $excretions = config('excretion');
        $stoolforms = config('stoolform');
        return view('home')->with([
            'items' => auth()->user()->vitaldata()->orderBy('date','asc')->paginate(7),
            'excretions' => $excretions,
            'stoolforms' => $stoolforms
        ]);
    }

    

}

?>
