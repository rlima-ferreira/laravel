<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    // Seta a tabela
    protected $table = 'books';

    // Atributos da tabela
    protected $fillable = ['id', 'name', 'category', 'author', 'pages'];

    // Define a chave primária
    protected $primaryKey = 'id';

    public $timestamp = false;

    // Chave Estrangeira para a tabela de usuários
    public function read()
    {
        return $this->belongsToMany('App\User', 'book_read');
    }

    // Chave Estrangeira para a tabela de usuários
    public function wanted()
    {
        return $this->belongsToMany('App\User', 'book_wanted');
    }
}
