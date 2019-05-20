@extends('layouts.app')

@section('content')


    <div class="container">

        <h2>Adicionar um usuario</h2>
        <br>

        <form action="{{ url('/create-user') }}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                @include("site.listUsers._include.formUser")

            <button type="submit" class="btn btn-success"style="float: right">Adicionar</button>
        </form>

        <a href="/" class="btn btn-danger"style="float: left"> Voltar</a>
        <br>
        <br>
        <br>
    </div>
@endsection