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
        $searchkeys = config('searchkey');
        $today = date("Y-m-d");
        return view('home',compact('today'))->with([
            'items' => auth()->user()->vitaldata()->orderBy('date','asc')->paginate(7),
            'excretions' => $excretions,
            'stoolforms' => $stoolforms,
            'searchkeys' => $searchkeys
        ]);
    }

    

}

?>
