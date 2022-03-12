@extends('master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href="/customer/create" class="btn btn-sm btn-primary float-right mb-3">Add Customer</a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Customer Name</th>
                        <th scope="col">Customer Email</th>
                        <th scope="col">Customer Phone</th>
                        {{-- <th scope="col">Customer Address</th> --}}
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->customer_name}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->phone}}</td>
                        {{-- <td>{{$item->address}}</td> --}}
                        <td>
                            <a href="/customer/{{$item->id}}" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Tooltip on top"><i class="far fa-eye"></i></a>
                            <a href="/customer/{{$item->id}}/edit" class="btn btn-sm btn-warning"><i class="far fa-edit"></i></a>
                            <form action="/customer/{{$item->id}}" class="d-inline" method="post" onsubmit="return confirm('Are you sure to delete?')">
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
        </div>
    </div>
</div>
@endsection
