<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Customer;
use App\Http\Models\Winning_Number;
use Redirect;

class CustomerController extends Controller
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
        $data = Customer::whereNull('deleted_at')->paginate(10);
        // dd($data);
        return view('customer.index',['data' => $data,'count' => $this->winning_count]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer.create')->with('count',$this->winning_count);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $check = Customer::where('email',$request->email)->get()->count();
        // dd($check);
        if($check == 0){
            $data = new Customer;
            $data->create($request->except('_token'));
            return redirect('/customer');
        }
        else{
            // dd($request->all());
            $form_data = $request->all();
            // dd($form_data['customer_name']);
            return Redirect::back()
                                ->with('status','Email Already Exits!')
                                ->with('name', $form_data['customer_name'])
                                ->with('email' ,$form_data['email'])
                                ->with('phone' , $form_data['phone'])
                                ->with('address' , $form_data['address']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Customer::find($id);
        return view('customer.show',['data' => $data,'count' => $this->winning_count]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Customer::find($id);
        return view('customer.edit')->with('data', $data)
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
        $data = Customer::find($id);
        $data->customer_name = $request['customer_name'];
        $data->email = $request['email'];
        $data->phone = $request['phone'];
        $data->address = $request['address'];
        $data->save();
        return redirect('/customer');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $test = Customer::find($id)->lucky_number()->delete();
        Customer::destroy($id);
        return redirect('/customer');
    }
}
