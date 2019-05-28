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
   /*  public function __construct()
    {
        $this->middleware('auth');
    }
 */
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    public function index(Request $request)
    {
        $excretions = config('excretion');
        $stoolforms = config('stoolform');
        $input = $request->input();
        $items = auth()->user()->vitaldata();
        if (isset($input['datefrom']) && $input['datefrom']) {
            $items->where('date', '>=', $input['datefrom']);
        }else{
            $input['datefrom'] = null;
        }

        if (isset($input['dateto']) && $input['dateto']) {
            $items->where('date', '<=', $input['dateto']);
        }else{
            $input['dateto'] = null;
        } 
        if (isset($input['bodytemperaturefrom']) && $input['bodytemperaturefrom']) {
            $items->where('bodytemperature', '>=', $input['bodytemperaturefrom']);
        }else{
            $input['bodytemperaturefrom'] = null;
        }

        if (isset($input['bodytemperatureto']) && $input['bodytemperatureto']) {
            $items->where('bodytemperature', '<=', $input['bodytemperatureto']);
        }else{
            $input['bodytemperatureto'] = null;
        }

        if (isset($input['pulsefrom']) && $input['pulsefrom']) {
            $items->where('pulse', '>=', $input['pulsefrom']);
        }else{
            $input['pulsefrom'] = null;
        }

        if (isset($input['pulseto']) && $input['pulseto']) {
            $items->where('pulse', '<=', $input['pulseto']);
        }else{
            $input['pulseto'] = null;
        }

        if (isset($input['systolicbpfrom']) && $input['systolicbpfrom']) {
            $items->where('systolicbp', '>=', $input['systolicbpfrom']);
        }else{
            $input['systolicbpfrom'] = null;
        }

        if (isset($input['systolicbpto']) && $input['systolicbpto']) {
            $items->where('systolicbp', '<=', $input['systolicbpto']);
        }else{
            $input['systolicbpto'] = null;
        }

        if (isset($input['diastlicbpfrom']) && $input['diastlicbpfrom']) {
            $items->where('diastlicbp', '>=', $input['diastlicbpfrom']);
        }else{
            $input['diastlicbpfrom'] = null;
        }

        if (isset($input['diastlicbpto']) && $input['diastlicbpto']) {
            $items->where('diastlicbp', '<=', $input['diastlicbpto']);
        }else{
            $input['diastlicbpto'] = null;
        }

        if (isset($input['excretion'])&& is_array($input['excretion'])) {
            $items->whereIn('excretion', $input['excretion']);
        }else{
            $input['excretion'] = null;
        }

        if (isset($input['stoolform']) && is_array($input['stoolform'])) {
            $items->whereIn('stoolform', $input['stoolform']);
        }else{
            $input['stoolform'] = null;
        }
       
       

        return view('home')->with([
            'items' => $items->orderBy('date','asc')->paginate(3),
            'excretions' => $excretions,
            'stoolforms' => $stoolforms,
            'input' => $input
        ]);
    }

}

?>
