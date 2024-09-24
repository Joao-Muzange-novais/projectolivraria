<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/livros', [BookController::class, 'index']); //Apresenta o Insex
Route::get('/livros/{id_livro}', [BookController::class, 'show']); //Visualizar Livros
Route::get('/create', [BookController::class, 'create']); //Cadastrar livros
Route::post('/livros', [BookController::class, 'store']); //Armazenamento do dados cadastrado
Route::get('/livros/{id_livro}/edit', [BookController::class, 'edit']);//Editar livro
Route::put('/livros/{id_livro}', [BookController::class, 'update']);//Actualizar livr
Route::delete('/livros/{id_livro}', [BookController::class, 'destroy']); 
//Nota:verbo delete também esta ser chamdo no ajax.open('DELETE') 