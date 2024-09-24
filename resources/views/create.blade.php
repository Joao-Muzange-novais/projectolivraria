@extends('templates.template')

@section('content')
    <h1 class="text-center"> @if(isset($livro)) Editar
        
    @else Cadastrar
        
    @endif</h1> <hr> 

    <div class="col-8 m-auto">
        <!-- div de validacao depois de criar  -->
        
        @if (@isset($errors) && count($errors)>0)
            <div class="text-center mt-4 mb-4 p-2 alert-denger">
                @foreach ($errors->all() as $erro)
                    {{$erro}}<br>
                @endforeach        
            </div>   
        @endif

        @if (isset($livro))
            <form name="formEdit" id="formEdit" action="{{url("livros/$livro->id")}}"   method="post"> 
                @method('PUT')
        @else
            <form name="formCad" id="formCad" action="{{url('livros')}}" method="post">
        @endif
        @csrf  
        <!--é um mecanismo de seguranca csrf é um tokin obrigatorio proteginos contra ataques cross sites request forgeres se não aplicamos o nosso formulario não ira funcionar, csrf gere um tokin para cada requisicao ou seja cada vez que usamos o formulario ele altera os dados do tokin ex: inspeciona a pagina-->

        <input class="form-control" type="text" name="titulo" id="titulo" placeholder="Título:" value="{{$livro->titulo ?? ''}}" required><br>

        <select class="form-control" name="user_id" id="user_id">
            <option value="{{$livro->relUsers->id ?? ''}}">{{$livro->relUsers->nome ?? 'Autor'}}</option>
            @foreach ($users as $user)
                <option value="{{$user->id}}">{{$user->nome}}</option>
            @endforeach
        </select>

        <input class="form-control" type="text" name="pagina" id="pagina" placeholder="Página:"     value="{{$livro->pagina ?? ''}}" required><br>
        
        <input class="form-control" type="text" name="preco" id="preco" placeholder="Preço:" 
            value="{{$livro->preco ?? ''}}" required><br>
    
        <input class="btn btn-primary" type="submit" value="@if(isset($livro)) Editar @else cadastrar @endif">
        </form>
    </div>
@endsection