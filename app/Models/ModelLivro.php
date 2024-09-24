<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelLivro extends Model
{
    protected $table='livros'; //livros é o nome da tabela que foi criada na migrate
    protected $fillable=['titulo','user_id','pagina','preco']; //medida de seguranca do laravel dos campos que serão cadastrados no BD do laravel
    
    public function relUsers() //relUsers é relacionamento user
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
    use HasFactory;
}
