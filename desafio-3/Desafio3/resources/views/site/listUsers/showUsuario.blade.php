@extends('layouts.app')

@section('content')


    <div class="container">
        <h2>Usuario: {{$user->nome}}</h2>
        <br>

        <form action="{{ url('/atualizar-user',$user->id) }}" method="POST">

            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            @include("site.listUsers._include.formUser")

            <button type="submit" class="btn btn-success"style="float: right">Atualizar</button>
        </form>

        <form action="{{ url('/deletar-user') }}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="id" value="{{$user->id}}">

            <button type="submit" class="btn btn-secondary"style="float: right; margin-right: 15px">Deletar</button>
        </form>

        <a href="/" class="btn btn-danger"style="float: left"> Voltar</a>
        <br>
        <br>
        <br>
    </div>
@endsection