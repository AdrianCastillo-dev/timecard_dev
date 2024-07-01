<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ManagerController extends Controller
{
    public function index(){
        return view('manager.index');
    }
    public function activity(){
        $id = Auth::id();
        //dd($id);
        $aps = DB::select("call aps({$id})");
        $activity = DB::select("call activity({$id})");
        
        return view('manager.activity',compact('aps','activity'));
        
    }
    public function submit_direct(Request $request)
    {
       //dd($request);
       
       DB::select(" call add_activity(1,'{$request->title}','{$request->description}') ");

       return redirect()->back()->with(['success' => 'Successfully submit activity.']);

    }
    public function submit_indirect(Request $request)
    {
       DB::select(" call add_activity(2,'{$request->title}','{$request->description}') ");
       return redirect()->back()->with(['success' => 'Successfully submit activity.']);
    }
    public function drop($type, $id){
        DB::select("call drop_activity({$id},{$type})");
        return redirect()->back()->with(['success' => 'Successfully drop activity.']);
    }
    public function aps()
    {

        $aps = DB::select("call aps_users(0)");
        $aps_get = DB::select("call aps(0)");
        $users = DB::select("call users(1)");


        //dd($users);
        return view('manager.aps',compact('aps','aps_get','users'));
    }

    public function submit_aps(Request $request){
        $aps = DB::select("call aps_users(0)");

        $con = DB::selectone(" call add_aps_user({$request->aps},{$request->user}) ");
        if ($con->con == '2') {
            //dd('hola');
            return redirect()->back()->withErrors(['error' => 'The user has already been assigned to this APS.']);               
        }
        else{
            return redirect()->back()->with(['success' => 'The user was assigned to this APS.']);               
        }
        
    }
    public function drop_aps($id){
        DB::select(" call drop_aps_user({$id})");
        return redirect()->back()->with(['success' => 'The user was dropped to this APS.']);               
    }

    public function users()
    {
        $users = DB::select(" call users(0) ");
        return view('manager.users',compact('users'));
    }

    public function users_add($id,$type){
        DB::selectone(" call user_assignment({$id},{$type}) ");
        return redirect()->back()->with(['success' => 'The user was assigned.']);               
       
    }

    public function analysis()
    {
        $aps = DB::select("call aps_time(0)");
        $time_activity = DB::select("call time_activity(0)");

        $json_aps = json_encode($aps);

        //dd($aps);
        $json_time_activity = json_encode($time_activity);

        //dd($time_activity);
        return view('manager.analysis',compact('aps','time_activity','json_aps','json_time_activity'));
    }

    public function act_user($id){
        $users = DB::select(" call users_act({$id}) ");
        //dd($users);
        return view('manager.activity_users',compact('users'));
    }
}
