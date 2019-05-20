<ul class="pagination justify-content-center" style="margin:20px 0">
    @foreach($qtdPages as $key => $qtdPagina)
        <li class="page-item @if($qtdPagina == true) active @endif "><a class="page-link"  href="?page={{$key}}">{{$key}}</a></li>
    @endforeach
    @foreach($qtdPages as $key => $qtdPagina)
        @if($qtdPagina == true)
            <li class="page-item"><a class="page-link" href="?page={{$key+1}}">Next</a></li>
        @endif
    @endforeach
</ul>