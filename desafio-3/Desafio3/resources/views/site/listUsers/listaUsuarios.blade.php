@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="col-md-11">
            <h1> Lista Usuarios </h1>
            <p>Quantidade: {{count($list)}}</p>

            <a href="/create-user" class="btn btn-success"style="float: left"> Adicionar</a>

            <br>
            <br>
            <br>
        </div>


        <input class="form-control" id="searchTable" type="text" placeholder="Search..">
        <br>

        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Senha</th>
                <th>Data Nascimento</th>
                <th>Editar</th>
            </tr>
            </thead>
            <tbody id="tableUsers">
                @foreach($list as $name)
                    <tr>
                    <td>{{$name->nome}}</td>
                    <td>{{$name->email}}</td>
                    <td>{{$name->senha}}</td>
                    <td>{{$name->dtNascimento}}</td>
                    <td>
                        <form action="{{ url('/visualizar-user',$name->id) }}" method="GET" >
                            <button type="submit" class="btn btn-success">Editar</button>
                        </form>
                    </td>
                    </tr>
                @endforeach
            </tbody>
        </table>


    </div><br><br><br>
@endsection