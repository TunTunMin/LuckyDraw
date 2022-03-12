@extends('master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <h3 class="text-center mb-4">Lucky Number Details</h3>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            @php
                                $customer_name = App\Http\Models\Customer::find($data->customer_id)->customer_name;
                            @endphp
                            <th>Customer Name</th>
                            <td>{{$customer_name}}</td>
                        </tr>
                        <tr>
                            <th>Lucky Number</th>
                            <td>{{$data->lucky_number}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection