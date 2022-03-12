@extends('master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="card bg-light mb-3">
                    <div class="card-header">Customer Edit Form</div>
                    <div class="card-body">
                        <form method="post" action="/customer/{{$data->id}}">
                            @csrf
                            @method('PUT')
                            <div class="form-row form-group">
                                <div class="col">
                                    <label for="customer_name">Customer Name: *</label>
                                    <input type="text" class="form-control" name="customer_name" id="prize_type" value="{{$data->customer_name}}" placeholder="Customer Name" required>
                                </div>
                                <div class="col">
                                        {{-- @if (session('status'))
                                        <span class="text-danger">
                                            {{ session('status') }}
                                        </span>
                                        @endif  --}}
                                    <label for="email">Customer Email: </label>
                                    <input type="email" class="form-control" name="email" id="prize_type" value="{{$data->email}}" placeholder="Customer Email">
                                </div>
                                <div class="col">
                                    <label for="phone">Customer Phone:</label>
                                    <input type="text" class="form-control" name="phone" id="prize_type" value="{{$data->phone}}" placeholder="Phone">
                                </div>
                            </div>
                            <div class="form-row form-group">
                                <div class="col">
                                    <label for="address">Customer Address: </label>
                                    <textarea name="address" id="address" rows="5" class="form-control" placeholder="Enter Address">{{strip_tags($data->address)}}</textarea>
                                </div>
                            </div>
                            <input type="submit" value="Update Customer" class="btn btn-primary mt-3 float-right">
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
        
@endsection