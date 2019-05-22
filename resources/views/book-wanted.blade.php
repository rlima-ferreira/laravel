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
                        <th>Nome</th>
                        <th>Categora</th>
                        <th>Autor</th>
                        <th>Páginas</th>
                    </thead>
                    <tbody>
                        @foreach ($wanteds as $book)
                            <tr>
                                <td>{{$book->id}}</td>
                                <td>{{$book->name}}</td>
                                <td>{{$book->category}}</td>
                                <td>{{$book->author}}</td>
                                <td>{{$book->pages}}</td>
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
                <h4 class="modal-title" id="exampleModalLongTitle">Novo Livro</h4>
            </div>
            <form action="{{route('mark-read')}}" method="post" style="margin-top: 30px">
                <div class="row">
                    <div class="col s12">
                        <div class="input-field col s12">
                            <select id="id" name="id">
                                <option value="" disabled selected>Selecione o livro</option>
                                @foreach ($books as $book)
                                    <option value="{{$book->id}}">{{$book->name}}</option>
                                @endforeach
                            </select>
                            <label>Selecione o livro desejado</label>
                        </div>
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
        $('select').formSelect();
    });
</script>
@endsection
