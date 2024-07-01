<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Session;

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
        $user = Auth::user();
        $id = Auth::id();

        Session::put('id',Auth::id());

        $result = DB::selectOne("call name( {$id} )");
        $name = $result->name;
        Session::put('name', $name);
        $result = DB::selectOne("call flag( {$id} )");
        $flag = $result->flag;
        Session::put('flag', $flag);

        return view('home');
    }
}
