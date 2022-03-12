<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Prize;
use App\Http\Models\Customer;
use App\Http\Models\Lucky_Number;
use App\Http\Models\Winning_Number;
use DB;

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
        $this->winning_count = Winning_Number::count();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $winning_prize_list = Winning_Number::pluck('prize_id');
        $prizes = DB::table('prizes')->whereNotIn('id',$winning_prize_list)->whereNull('deleted_at')->get();
        return view('web.lucky_draw',['prizes' => $prizes,'count' => $this->winning_count]);
    }
}
