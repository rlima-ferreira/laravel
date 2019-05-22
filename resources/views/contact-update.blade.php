@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col m6 offset-m3">
            <div class="card" style="padding: 5px 20px">
                <h4>Atualizar</h4>
                <div class="card-content">
                    <form method="post">
                        {{ method_field('put') }}
                        <div class="row">
                            <div class="col s4">
                                <div class="input-field">
                                    <select id="id" name="id">
                                        @foreach ($contacts as $contact)
                                            <option value="{{$contact->id}}">{{$contact->phone}}</option>
                                        @endforeach
                                    </select>
                                    <label for="id">Selecione um Contato</label>
                                </div>
                            </div>
                            <div class="col s9">
                                <div class="input-field" style="margin-top: 30px">
                                    <label for="phone">Telefone</label>
                                    <input type="text" id="phone" name="phone">
                                </div>
                            </div>
                            <div class="col s12 right-align" style="margin-top: 40px">
                                <button type="submit" class="btn btn-large">Atualizar</button>
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
            $('#phone').val(val.phone);
            $('form').attr('action', '/contact/' + val.id);
        })
        $('select').formSelect();
    })
</script>
@endsection
