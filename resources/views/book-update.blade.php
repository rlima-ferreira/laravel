@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col m10 offset-m1">
            <div class="card" style="padding: 5px 20px">
                <h4>Atualizar</h4>
                <div class="card-content">
                    <form method="post">
                        {{ method_field('put') }}
                        <div class="row">
                            <div class="col s4">
                                <div class="input-field">
                                    <select id="id" name="id">
                                        @foreach ($books as $book)
                                            <option value="{{$book->id}}">{{$book->name}}</option>
                                        @endforeach
                                    </select>
                                    <label for="id">Selecione um livro</label>
                                </div>
                            </div>
                            <div class="col s12">
                                <div class="input-field" style="margin-top: 30px">
                                    <label for="name">Nome</label>
                                    <input type="text" id="name" name="name">
                                </div>
                            </div>
                            <div class="col s12">
                                <div class="input-field" style="margin-top: 30px">
                                    <label for="category">Categoria</label>
                                    <input type="text" id="category" name="category">
                                </div>
                            </div>
                            <div class="col s12">
                                <div class="input-field" style="margin-top: 30px">
                                    <label for="author">Autor</label>
                                    <input type="text" id="author" name="author">
                                </div>
                            </div>
                            <div class="col s12">
                                <div class="input-field" style="margin-top: 30px">
                                    <label for="pages">Páginas</label>
                                    <input type="number" id="pages" name="pages">
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
            let val = await $.get('http://127.0.0.1:8000/book/' + $('.custom-select').val());
            $('#name').val(val.name);
            $('#category').val(val.category);
            $('#author').val(val.author);
            $('#pages').val(val.pages);
            $('form').attr('action', '/book/' + val.id);
        })
        $('select').formSelect();
    })
</script>
@endsection
