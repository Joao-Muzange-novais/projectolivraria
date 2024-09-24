@extends('templates.template')

@section('content')
    <h1 class="text-center">Visualizar</h1> <hr> 

    <div class="col-8 m-auto">
        @php
            $user=$livro->find($livro->id)->relUsers;
        @endphp
        Id:     {{$livro->id}}<br>
        Título: {{$livro->titulo}}<br>
        Página: {{$livro->pagina}}<br>
        Preço:  {{$livro->preco}} KZ<br>
        Autor: {{$user->nome}}<br>
        Email do autor: {{$user->email}}<br>
        
    </div>
@endsection