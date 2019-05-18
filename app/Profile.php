<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    // Seta a tabela
    protected $table = 'profiles';

    // Atributos da tabela
    protected $fillable = ['id', 'type'];

    // Define a chave primária
    protected $primaryKey = 'id';

    public $timestamp = false;

    // Chave estrangeira para a tabela de usuários
    public function user()
    {
        return $this->hasMany('App\User');
    }
}
