@extends('master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <h3 class="text-center mb-4">Customer Details</h3>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>Customer Name</th>
                            <td>{{$data->customer_name}}</td>
                        </tr>
                        <tr>
                            <th>Customer Email</th>
                            <td>{{$data->email}}</td>
                        </tr>
                        <tr>
                            <th>Customer Phone</th>
                            <td>{{$data->phone}}</td>
                        </tr>
                        <tr>
                            <th>Customer Address</th>
                            <td>{!!$data->address!!}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection