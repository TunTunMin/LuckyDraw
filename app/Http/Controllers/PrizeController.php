<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Prize;
use App\Http\Models\Winning_Number;

class PrizeController extends Controller
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


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Prize::all();
        return view('prize.index')->with('data', $data)
                                  ->with('count',$this->winning_count);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('prize.create')->with('count',$this->winning_count);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Prize;
        $data->create($request->except('_token'));
        return redirect('/prize');
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
        $data = Prize::find($id);
        return view('prize.edit')->with('data', $data)
                                    ->with('count',$this->winning_count);
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
        // dd($request->prize_type);
        $data = Prize::find($id);
        $data['prize_type'] = $request['prize_type'];
        $data->save();
        return redirect('/prize');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Prize::destroy($id);
        return redirect('/prize');
    }
}
