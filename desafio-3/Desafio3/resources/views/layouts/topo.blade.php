<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <a class="navbar-brand" href="/">Desafio 3 - Wandre Alkimin</a>
    <ul class="nav navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="/">Home</a>
        </li>
    </ul>
</nav><br>

<div class="container">
    <div  id="msg">
        @if(Session::has('msg'))
            <div class="alert alert-success alert-dismissable">
                <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {{Session::get('msg')}}
            </div>
        @endif
        @if(Session::has('msgErro'))
            <div class="alert alert-danger alert-dismissable">
                <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {{Session::get('msgErro')}}
            </div>
        @endif
    </div>
</div>

<br>