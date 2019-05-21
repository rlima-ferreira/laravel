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
                        <th class="text-center">Nome</th>
                        <th class="text-center">Categora</th>
                        <th class="text-center">Autor</th>
                        <th class="text-center">Páginas</th>
                    </thead>
                    <tbody>
                        @foreach ($reads as $book)
                            <tr>
                                <td class="text-center">{{$book->id}}</td>
                                <td class="text-center">{{$book->name}}</td>
                                <td class="text-center">{{$book->category}}</td>
                                <td class="text-center">{{$book->author}}</td>
                                <td class="text-center">{{$book->pages}}</td>
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
                <h5 class="modal-title" id="exampleModalLongTitle">Novo Livro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('mark-read')}}" method="post">
                <div class="modal-body">
                    <select class="custom-select" id="id" name="id">
                        @foreach ($books as $book)
                            <option value="{{$book->id}}">{{$book->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary px-4">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
