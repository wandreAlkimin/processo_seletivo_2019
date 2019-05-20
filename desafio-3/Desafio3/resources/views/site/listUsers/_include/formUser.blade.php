@php
    if(!isset($user)){
        $user = null;
    }
@endphp
<div class="row">

    <div class="form-group col-lg-12">
        <label for="Nome">Nome</label>
        <input class="form-control input-sm" type="text" name="nome" minlength="4" value="@isset($user) {{$user->nome }} @endisset" required autofocus>
    </div>
    <div class="form-group col-lg-8">
        <label for="email">Email</label>
        <input class="form-control input-sm" type="email" name="email" value="@isset($user){{$user->email?: ''}}@endisset" required autofocus>
    </div>
    <div class="form-group col-lg-5">
        <label for="Documento">Senha</label>
        <input class="form-control input-sm" type="password" name="senha"  minlength="6" maxlength="10" value="@isset($user){{$user->senha?: ''}}@endisset" required autofocus >
    </div>
    <div class="form-group col-lg-3">
        <label for="telefone">Data Nascimento</label>
        <input class="form-control input-sm" type="text" name="dtNascimento" data-mask="00/00/0000" minlength="10" maxlength="10" value="@isset($user){{$user->dtNascimento?: ''}}@endisset" required autofocus>
    </div>

</div>