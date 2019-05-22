@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col m4 offset-m4">
            <div class="card" style="padding: 5px 20px">
                <h4>Deletar</h4>
                <div class="card-content">
                    <form method="post" >
                        {{ method_field('delete') }}
                        <div class="row">
                            <div class="col s12" style="padding: 0">
                                <div class="input-field">
                                    <select class="custom-select" id="id" name="id">
                                        @foreach ($contacts as $contact)
                                            <option value="{{$contact->id}}">{{$contact->phone}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col s12 right-align" style="padding: 20px 0; margin-top: 20px">
                                <button type="submit" class="btn btn-large btn-danger btn-lg">Deletar</button>
                            </div>
                        </div>
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
        $('select').formSelect();
    })
</script>
@endsection
