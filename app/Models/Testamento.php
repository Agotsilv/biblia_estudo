<?php

namespace App\Models;

use App\Models\Livro;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testamento extends Model{

    use HasFactory;


    protected $fillable = ['nome'];




    /**
     * Pegando todos os livros vinculados
     */


     public function livros(){
      return $this->hasMany(Livro::class);
    }
}
