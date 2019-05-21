@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">Deletar</div>
                <div class="card-body">
                    <form action="#" method="post">
                        {{ method_field('delete') }}
                        <select class="custom-select" id="id" name="id">
                            @foreach ($contacts as $contact)
                                <option value="{{$contact->id}}">{{$contact->phone}}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-danger mt-5 btn-lg">Deletar</button>
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
            $('form').attr('action', '/contact/' + val.id);
        })
    })
</script>
@endsection
