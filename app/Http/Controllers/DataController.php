<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DataController extends Controller
{
    public function index() 
    {
        $date = Carbon::now()->format('Y-m-d');

        list($anio,$mes,$day) = explode('-',$date);

        $on = Carbon::create($anio, $mes, $day +1);
        $in = Carbon::create($anio, $mes, $day -7);

        //dd($on->format('Y-m-d'));
        //dd($in);

        $dias_del_mes = [];

        for ($i=0; $i <= 32 ; $i++) { 
            if ($in->format('Y-m-d') != $on->format('Y-m-d')) {
                //dd('if');
                $dias_del_mes[] = $in->format('Y-m-d');
                $in->addDay(); 
            }
        }
        //dd($dias_del_mes);

        $dias_del_mes = array_reverse($dias_del_mes);
        
        $id = Auth::id();

        $st = DB::selectOne("call data( {$id} )");

        $data_t = DB::select("call data_t( {$id} )");

        $aps_get = DB::select("call add_aps( {$id} )");
        //dd($aps_get);
        $type_activities = DB::select("call type_activities_get({$id})");

        //dd($type_activities);
        $st->st = '0';

        return view('data.index', compact('date','st','data_t','aps_get','dias_del_mes','type_activities'));
    }
    public function submit(Request $request)
    {
        $id = Auth::id();

        $data_t = DB::selectone("call time_get( {$id},'{$request->dias}' )");


        if ($data_t !== null) {
            $time_in = $data_t->t;
        }
        else{
            $time_in = 0;
        }

        $this->validate($request, [
            'time' => 'required',
        ]);

        $totalHoras = 9; 
        $horasIngresadas = $request->time;

        //dd($request);
        if ($horasIngresadas+$time_in > $totalHoras) {
            return redirect()->back()->withErrors(['time' => 'You can not log in more than 9 hours a day.']);
        }
        $id = Auth::id();

        //dd("call data_up( {$id},'{$request->title}','{$request->description}','{$request->dias}',{$request->time},{$request->aps},{$request->type} )");

        DB::selectOne("call data_up( {$id},'{$request->title}','{$request->description}','{$request->dias}',{$request->time},{$request->aps},{$request->type} )");
        
        return redirect()->back();
        
    }
}
