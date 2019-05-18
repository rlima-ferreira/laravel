<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    // Seta a tabela
    protected $table = 'contacts';

    // Atributos da tabela
    protected $fillable = ['id', 'phone'];

    // Define a chave primária
    protected $primaryKey = 'id';

    public $timestamp = false;

    // Chave estrangeira para a tabela de usuarios
    public function user()
    {
        return $this->hasOne('App\User');
    }
}