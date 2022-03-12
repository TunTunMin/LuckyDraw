<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Lucky_Number;
use App\Http\Models\Customer;
use App\Http\Models\Winning_Number;

class Lucky_NumberController extends Controller
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
        $data = Lucky_Number::paginate(10);
        return view("lucky_number.index",['data' => $data,'count' => $this->winning_count]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customer = Customer::select('customer_name','id','email')->get();
        return view("lucky_number.create",['customer' => $customer,'count' => $this->winning_count]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Lucky_Number;
        $data->create($request->except('_token'));
        return redirect('/lucky_number');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Lucky_Number::find($id);
        return view("lucky_number.show",['data' => $data,'count' => $this->winning_count]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::select('customer_name','id','email')->get();
        $data = Lucky_Number::find($id);
        return view("lucky_number.edit",['data' => $data, 'customer' => $customer,'count' => $this->winning_count]);
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
        Lucky_Number::find($id)->update(['lucky_number' => $request->lucky_number,'customer_id' => $request->customer_id]);
        return redirect('/lucky_number');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Lucky_Number::destroy($id);
        return redirect('/lucky_number');
    }
}
