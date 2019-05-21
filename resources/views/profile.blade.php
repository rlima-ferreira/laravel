@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="mb-4 text-right">
                <button type="button" class="btn btn-success px-4" data-toggle="modal" data-target="#new">
                    Adicionar
                </button>
            </div>
        </div>
        <div class="col-md-11">
            <div>
                <table class="table table-light table-hover">
                    <thead>
                        <th class="text-center">Código</th>
                        <th class="text-center">Tipo</th>
                    </thead>
                    <tbody>
                        @foreach ($profiles as $profile)
                            <tr>
                                <td class="text-center">{{$profile->id}}</td>
                                <td class="text-center">{{$profile->type}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
{{-- Modal Novo --}}
<div class="modal fade" id="new" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Novo Perfil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('profile.store')}}" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="type">Tipo</label>
                        <input type="text" class="form-control" id="type" name="type">
                    </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary px-4">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
