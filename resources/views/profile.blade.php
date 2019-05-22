@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col m11">
            <div class="right-align" style="margin-bottom: 20px">
                <a class="waves-effect waves-light btn modal-trigger" href="#new">Adicionar</a>
            </div>
        </div>
        <div class="col m11">
            <div>
                <table class="highlight centered">
                    <thead>
                        <th>Código</th>
                        <th>Tipo</th>
                    </thead>
                    <tbody>
                        @foreach ($profiles as $profile)
                            <tr>
                                <td>{{$profile->id}}</td>
                                <td>{{$profile->type}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
{{-- Modal Novo --}}
<div id="new" class="modal">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLongTitle">Novo Perfil</h4>
            </div>
            <form action="{{route('profile.store')}}" method="post" style="margin-top: 30px">
                <div class="modal-body">
                    <div class="input-field">
                        <label for="type">Tipo</label>
                        <input type="text" class="form-control" id="type" name="type">
                    </div>
                </div>
                <div class="modal-footer" style="margin-top: 30px">
                    <button type="submit" class="btn btn-large waves-effect waves-light">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('.modal').modal();
    });
</script>
@endsection
