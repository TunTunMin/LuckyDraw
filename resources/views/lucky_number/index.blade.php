@extends('master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href="/lucky_number/create" class="btn btn-sm btn-primary float-right mb-3">Add Lucky Number</a>
            @if ($data->count() > 0)
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Customer Name</th>
                        <th scope="col">Lucky Number</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    @php
                        $customer_name = App\Http\Models\Customer::find($item->customer_id)->customer_name;
                    @endphp
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$customer_name}}</td>
                        <td>{{$item->lucky_number}}</td>
                        <td>
                            <a href="/lucky_number/{{$item->id}}" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Tooltip on top"><i class="far fa-eye"></i></a>
                            <a href="/lucky_number/{{$item->id}}/edit" class="btn btn-sm btn-warning"><i class="far fa-edit"></i></a>
                            <form action="/lucky_number/{{$item->id}}" class="d-inline" method="post" onsubmit="return confirm('Are you sure to delete?')">
                                @csrf
                                @method('DELETE ')
                                <button type="submit" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
            {{$data->links()}}
            @else
                <h2>There is no data!</h2>
            @endif
        </div>
    </div>
</div>
@endsection
