


@foreach($noticias as $noticia)

    <article class="box-noticia"><!--Notícia-->
        <a href="{{$noticia['url']}}" >
            <figure>
                <img src="{{$noticia['imagem']}}" alt="Imagem" >
            </figure>
            <div class="texto-lista-noticias">
                <span class="data-lista-noticia">{{$noticia['data_formatada']}}</span>
                <h1>{{$noticia['titulo']}}</h1>
                {{$noticia['texto']}}
            </div>
        </a>
    </article><!--Fim Notícia-->
    <hr>

@endforeach


