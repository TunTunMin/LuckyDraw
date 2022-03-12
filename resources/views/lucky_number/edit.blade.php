@extends('master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card bg-light mb-3">
                    <div class="card-header">Lucky Number Edit Form</div>
                    <div class="card-body">
                        <form method="post" action="/lucky_number/{{$data->id}}">
                            @csrf
                            @method('PUT')
                            <div class="form-row form-group">
                                <div class="col">
                                    <label for="lucky_number">Lucky Number: *</label>
                                    <input type="number" class="form-control" min="0" max="9999" name="lucky_number" id="lucky_number" placeholder="Lucky Number" value="{{$data->lucky_number}}" required>
                                </div>
                                <div class="col">
                                    <label for="customer_id">Customer Name: * </label>
                                    <select class="custom-select" name="customer_id" id="customer_id" required>
                                        <option value="">Select Customer</option>
                                        @foreach ($customer as $item)
                                            @if ($item->id == $data->customer_id)
                                                <option value="{{$item->id}}" selected>{{$item->customer_name}}</option>
                                            @else
                                                <option value="{{$item->id}}">{{$item->customer_name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <input type="submit" value="Update Lucky Number" class="btn btn-primary mt-3 float-right">
                        </form>
                    </div>
                </div>
            </div> 
        </div>
    </div>
@endsection