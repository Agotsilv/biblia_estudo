<?php

namespace App\Models;

use App\Models\Versiculo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model{
    use HasFactory;

        protected $fillable = ['posicao', 'nome', 'abreviacao', 'testamento_id'];



    public function versiculos(){
      return $this->hasMany(Versiculo::class);
    }
}
