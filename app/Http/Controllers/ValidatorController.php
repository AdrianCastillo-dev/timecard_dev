<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ValidatorController extends Controller
{
    public function index()
    {
        $id = Auth::id();
        $users = DB::select("call users({$id})");

        return view('validator.index', compact('users'));
    }
    public function user($id)
    {
        $data = DB::select("call data_t({$id})");
        //dd($data);
        $id_user = Auth::id();
        return view('validator.validator', compact('data','id_user'));
        
    }
    public function validated($id)
    {
        //dd($id);
        DB::selectone("call validated( {$id} )");
        return redirect()->back()->with(['success' => 'Successfully validated activity.']);
    }
    public function drop($id)
    {
        //dd("call data_drop( {$id} )");
        DB::selectone("call data_drop( {$id} )");
        return redirect()->back()->with(['success' => 'Successfully drop activity.']);
    }
}
