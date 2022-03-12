@extends('master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card bg-light mb-3">
                    <div class="card-header">Prize</div>
                    <div class="card-body">
                        <form method="post" action="/prize">
                            @csrf
                            <div class="form-row">
                              <div class="col">
                                <label for="prize_type">Prize Name: *</label>
                                <input type="text" class="form-control" name="prize_type" id="prize_type" placeholder="Prize Name" required>
                              </div>
                              {{-- <div class="col">
                                <label for="prize_type_id">Parent Prize:</label>
                                <select class="custom-select" name="prize_type_id" id="prize_type_id">
                                    <option value="">None</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                              </div> --}}
                            </div>
                            <input type="submit" value="Add Prize" class="btn btn-primary mt-3 float-right">
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
@endsection