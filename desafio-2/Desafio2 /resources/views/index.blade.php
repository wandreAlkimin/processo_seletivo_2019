@extends('layout.app')

@section('content')


    <section class="conteudo-internas">
    <div class="centraliza">
        <div class="conteudo-esquerda">
            <div class="lista row"><!--Lista de Noticias-->
                <form action="?pesquisa" class="form-group col-10">
                    <div class="busca col-12-lg">
                        <input type="text" name="pesquisa"  class="form-control col-8" placeholder="Digite sua busca" value="@if($valueSearch){{$valueSearch}}  @endif">
                        <button class="btn btn-primary col-2"> Buscar </button>
                    </div>
                </form>

                <div  class="col-12-lg">
                    <a href="/" class="btn btn-outline-success"> Home </a>
                </div>


                @include('site._includes.artigo')

            </div><!--Fim Lista de Noticias-->
        </div> <!-- final conteudo-esquerda -->
    </div> <!-- final centraliza -->
</section>


@endsection