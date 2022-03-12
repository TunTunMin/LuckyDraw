@extends('master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href="/prize/create" class="btn btn-sm btn-primary float-right mb-3">Add Prize</a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Prize Type</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                   
                    @foreach ($data as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->prize_type}}</td>
                        <td>
                            <a href="/prize/{{$item->id}}/edit" class="btn btn-sm btn-warning">Edit</a>
                            <form action="/prize/{{$item->id}}" class="d-inline" method="post" onsubmit="return confirm('Are you sure to delete?')">
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