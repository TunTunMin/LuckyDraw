<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Prize;
use App\Http\Models\Customer;
use App\Http\Models\Lucky_Number;
use App\Http\Models\Winning_Number;
use DB;

class Winning_NumberController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->winning_count = Winning_Number::count();
    }

    public function winning_form()
    {
        $winning_prize_list = Winning_Number::pluck('prize_id');

        $prizes = DB::table('prizes')->whereNotIn('id',$winning_prize_list)->whereNull('deleted_at')->get();
        // dd($prizes);
        // $customers = Customer::all();
        return view('web.lucky_draw',['prizes' => $prizes,'count'=>$this->winning_count]);
    }

    public function do_winning(Request $request)
    {
        $data = Lucky_Number::groupBy('customer_id')->select('customer_id', DB::raw('count(*) as total'))->get();
        $max_winning = $data->where('total',$data->max('total'));
        $exit_first_prize = Winning_Number::where('prize_id',1)->count();
        
        if($request->prize_id == 1){
            // $data = Lucky_Number::groupBy('customer_id')->select('customer_id', DB::raw('count(*) as total'))->get();
            // $result = $data->where('total',$data->max('total'));
            $customer_id = $max_winning->pluck('customer_id');
        }else{
            $winning_customer_list = Winning_Number::pluck('customer_id')->toArray();
            $max_winning_customer_lsit = $max_winning->pluck('customer_id')->toArray();

                if($exit_first_prize == 0){
                    $final_customer_list = array_merge($winning_customer_list,$max_winning_customer_lsit);
                }else{
                    $final_customer_list = $winning_customer_list;
                }

            $result = DB::table('lucky_numbers')->groupBy('customer_id')->whereNotIn('customer_id',$final_customer_list)->whereNull('deleted_at')->get();
            $customer_id = $result->pluck('customer_id');
        }

        $lucky_number = DB::table('lucky_numbers')->whereIn('customer_id',$customer_id)->whereNull('deleted_at')->pluck('lucky_number')->toArray();
        // dd($lucky_number);
        $randomIndex = array_rand($lucky_number);
        return $lucky_number[$randomIndex];
    }

    public function save_winning(Request $request)
    {
        // dd($request->all());
        $customer_id = Lucky_Number::where('lucky_number',$request->lucky_number)->first()->customer_id;
        $data = new Winning_Number;
        $data->prize_id = $request->prize_id;
        $data->customer_id = $customer_id;
        $data->winning_number = $request->lucky_number;
        $data->save();
        return redirect()->back();
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Winning_Number::all();
        return view('winning_number.index',['data' => $data,'count' => $this->winning_count]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Winning_Number::destroy($id);
        return redirect('/winning_number');
    }
}
