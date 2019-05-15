<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['id', 'name', 'category', 'author', 'pages'];
    // protected $table = 'book';
    // protected $primaryKey = 'id';
    // public $timestamp = false;
    // private $id;
    // private $name;
    // private $category;
    // private $author;
    // private $pages;
}
