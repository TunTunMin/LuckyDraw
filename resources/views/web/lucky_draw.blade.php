@extends('master')
@push('styles')
    <style>
        a.disabled {
            pointer-events: none;
            cursor: default;
        }
    </style>
@endpush
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <form action="/save_winning" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="prize_id">Prize Type: *</label>
                        <select class="custom-select" name="prize_id" id="prize_id" class="form-control" required>
                            <option value="">Select Prize</option>
                            @foreach ($prizes as $prize)
                                <option value="{{$prize->id}}">{{$prize->prize_type}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="random">Generate Randomly</label>
                            <select class="custom-select" name="random" id="random" required>
                                <option value="">Select One</option>
                                <option value="1">Yes</option>
                                {{-- <option value="2">No</option> --}}
                            </select>
                    </div>
                    <div class="form-group">
                        <label for="lucky_number">Winning Number</label>
                        <input type="text" value="" class="form-control" name="lucky_number" id="lucky_number" readonly>
                    </div>
                    
                    <button type="button" id="btn-draw" class="btn btn-dark">Draw</button>
                    <button type="submit" class="btn btn-success" id="btn-save" disabled>Save</button>
                    
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>

        $('#btn-draw').click(function(){
            const prize_id = $('#prize_id').val();
            if(prize_id !== ''){
                $.ajax({
                    type:'GET',
                    url: '/do_winning',
                    data: {prize_id: prize_id},
                    success: function(data){
                        $('#lucky_number').val(data);
                        $('#btn-draw').attr("disabled", true);
                        $('#btn-save').attr("disabled", false);
                    }
                });
            }
        });
    </script>
@endpush


