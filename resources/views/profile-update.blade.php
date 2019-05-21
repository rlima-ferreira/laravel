@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">Atualizar</div>
                <div class="card-body">
                    <form method="post">
                        {{ method_field('put') }}
                        <select class="custom-select" id="id" name="id">
                            @foreach ($profiles as $profile)
                                <option value="{{$profile->id}}">{{$profile->type}}</option>
                            @endforeach
                        </select>
                        <div class="form-group mt-3">
                            <label for="type">Tipo</label>
                            <input type="text" class="form-control" id="type" name="type">
                        </div>
                        <button type="submit" class="btn btn-primary mt-5 btn-lg">Atualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('.custom-select').change(async function() {
            let val = await $.get('http://127.0.0.1:8000/profile/' + $('.custom-select').val());
            $('#type').val(val.type);
            $('form').attr('action', '/profile/' + val.id);
        })
    })
</script>
@endsection
