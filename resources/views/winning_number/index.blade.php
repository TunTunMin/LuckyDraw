@extends('master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h4 class="mb-4">Winning Number Lists</h4>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Prize Type</th>
                        <th scope="col">Customer Name</th>
                        <th scope="col">Winning Number</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    @php
                        $prize_type = App\Http\Models\Prize::find($item->prize_id)->prize_type;
                        $customer_name = App\Http\Models\Customer::find($item->customer_id)->customer_name;
                    @endphp
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$prize_type}}</td>
                        <td>{{$customer_name}}</td>
                        <td>{{$item->winning_number}}</td>
                        <td>
                            <form action="/winning_number/{{$item->id}}" class="d-inline" method="post" onsubmit="return confirm('Are you sure to delete?')">
                                @csrf
                                @method('DELETE ')
                                <input type="submit" class="btn btn-sm btn-danger" value="Delete">
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection