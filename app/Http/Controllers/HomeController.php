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
    
    public function index(Request $request)
    {
        $excretions = config('excretion');
        $stoolforms = config('stoolform');
        $today = date("Y-m-d");
        $input = $request->input();
        dump($input);
        $items = auth()->user()->vitaldata();
        if (isset($input['datefrom']) && $input['datefrom']) {
            $items->where('date', '>=', $input['datefrom']);
        }

        if (isset($input['dateto']) && $input['dateto']) {
            $items->where('date', '<=', $input['dateto']);
        } 
        if (isset($input['bodytemperaturefrom']) && $input['bodytemperaturefrom']) {
            $items->where('bodytemperature', '>=', $input['bodytemperaturefrom']);
        }

        if (isset($input['bodytemperatureto']) && $input['bodytemperatureto']) {
            $items->where('bodytemperature', '<=', $input['bodytemperatureto']);
        } 
        if (isset($input['pulsefrom']) && $input['pulsefrom']) {
            $items->where('pulse', '>=', $input['pulsefrom']);
        }

        if (isset($input['pulseto']) && $input['pulseto']) {
            $items->where('pulse', '<=', $input['pulseto']);
        } 
        if (isset($input['pulsefrom']) && $input['pulsefrom']) {
            $items->where('pulse', '>=', $input['pulsefrom']);
        }

        if (isset($input['systolicbpto']) && $input['systolicbpto']) {
            $items->where('systolicbp', '<=', $input['systolicbpto']);
        } 
        if (isset($input['systolicbpfrom']) && $input['systolicbpfrom']) {
            $items->where('systolicbp', '>=', $input['systolicbpfrom']);
        }

        if (isset($input['systolicbpto']) && $input['systolicbpto']) {
            $items->where('systolicbp', '<=', $input['systolicbpto']);
        } 
        if (isset($input['diastlicbpfrom']) && $input['diastlicbpfrom']) {
            $items->where('diastlicbp', '>=', $input['diastlicbpfrom']);
        }

        if (isset($input['diastlicbpto']) && $input['diastlicbpto']) {
            $items->where('diastlicbp', '<=', $input['diastlicbpto']);
        }

        if (isset($input['excretion'])&& is_array($input['excretion'])) {
            $items->where('excretion', $input['excretion']);
        }

        if (isset($input['stoolform']) && is_array($input['stoolform'])) {
            $items->where('stoolform', $input['stoolform']);
        } 
        
        return view('home',compact('today'))->with([
            'items' => $items->orderBy('date','asc')->paginate(3),
            'excretions' => $excretions,
            'stoolforms' => $stoolforms,
        ]);
    }

}

?>
