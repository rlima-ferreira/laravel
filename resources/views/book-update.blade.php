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
                            @foreach ($books as $book)
                                <option value="{{$book->id}}">{{$book->name}}</option>
                            @endforeach
                        </select>
                        <div class="form-group mt-3">
                            <label for="name">Nome</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="form-group mt-3">
                            <label for="category">Categoria</label>
                            <input type="text" class="form-control" id="category" name="category">
                        </div>
                        <div class="form-group mt-3">
                            <label for="author">Autor</label>
                            <input type="text" class="form-control" id="author">
                        </div>
                        <div class="form-group mt-3">
                            <label for="pages">Páginas</label>
                            <input type="number" class="form-control" id="pages">
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
            let val = await $.get('http://127.0.0.1:8000/book/' + $('.custom-select').val());
            $('#name').val(val.name);
            $('#category').val(val.category);
            $('#author').val(val.author);
            $('#pages').val(val.pages);
            $('form').attr('action', '/book/' + val.id);
        })
    })
</script>
@endsection
