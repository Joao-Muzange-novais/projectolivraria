@extends('templates.template')

@section('content')
    <h1 class="text-center">Crud</h1> <hr> 

    <div class="text-center mt-3 mb-4">
        <a href="{{url("create")}}">
            <button class="btn btn-success
            ">Cadastrar</button>
        </a>
    </div>

    <div class="col-8 m-auto">
        @csrf <!-- tokin de segurança para o javascript também esta a ser chamado no javascript -->
        <table class="table text-center">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">User_Id</th>
                    <th scope="col">Título</th>
                    <th scope="col">Autor</th>
                    <th scope="col">Preço</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
 
                @foreach ($livro as $livros)
                    @php
                        $user=$livros->find($livros->id)->relUsers;   
                    @endphp
                    <tr>
                        <th scope="row">{{$livros->id}}</th>
                        <td>{{$livros->user_id}}</td>
                        <td>{{$livros->titulo}}</td>
                        <td>{{$user->nome}}</td>
                        <td>{{$livros->preco}}</td>
                        
                        <td>
                            <a href="{{url("livros/$livros->id")}}"> <!--livros é a tabela  -->
                                <button class="btn btn-dark">Visualizar</button>
                            </a>

                            <a href="{{url("livros/$livros->id/edit")}}">
                                <button class="btn btn-primary">Editar</button>
                            </a>

                            <a href="{{url("livros/$livros->id")}}" class="js-del">
                                <button class="btn btn-danger">Deletar</button>
                            </a>

                        </td>
                  </tr>
                @endforeach
            </tbody>
          </table>
          
    </div>
@endsection