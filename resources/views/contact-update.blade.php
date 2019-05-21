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
                            @foreach ($contacts as $contact)
                                <option value="{{$contact->id}}">{{$contact->phone}}</option>
                            @endforeach
                        </select>
                        <div class="form-group mt-3">
                            <label for="phone">Telefone</label>
                            <input type="phone" class="form-control" id="phone" name="phone">
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
            let val = await $.get('http://127.0.0.1:8000/contact/' + $('.custom-select').val());
            $('#phone').val(val.phone);
            $('form').attr('action', '/contact/' + val.id);
        })
    })
</script>
@endsection
