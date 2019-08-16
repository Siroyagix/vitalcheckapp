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

    /**
     * ユーザーに紐づいたテーブルデータ表示・検索画面
     *
     * @param Request $request
     * @return void
     */
     public function index(Request $request)
    {
        /**
         *@var mixed|Illuminate\Config\Repository $excretions
         *@var mixed|Illuminate\Config\Repository $stoolforms
         *@var array $input
         */
        $excretions = config('excretion');
        $stoolforms = config('stoolform');
        $whoesdata = auth()->user()->name;
        $input = array_diff_key($request->input(), array_flip([
            'page',
            '_token',
        ]));
        if (!$input) {
            $input = [
                'datefrom' => '',
                'dateto' => '',
                'bodytemperaturefrom' => '',
                'bodytemperatureto' => '',
                'pulsefrom' => '',
                'pulseto' => '',
                'systolicbpfrom' => '',
                'systolicbpto' => '',
                'diastlicbpfrom' => '',
                'diastlicbpto' => '',
                'excretion' => '',
                'stoolform' => '',
            ];
        }
        /**
         * @var mixed $items
         */
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
            $items->whereIn('excretion', $input['excretion']);
        }

        if (isset($input['stoolform']) && is_array($input['stoolform'])) {
            $items->whereIn('stoolform', $input['stoolform']);
        }
        return view('home')->with([
            'items' => $items->orderBy('date','desc')->paginate(10),
            'excretions' => $excretions,
            'stoolforms' => $stoolforms,
            'input' => $input,
            'whoesdata' => $whoesdata
        ]);
    }

}

?>
