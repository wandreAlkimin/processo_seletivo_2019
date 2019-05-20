<?php

namespace App\Http\Controllers;

use App\Usuario;
use DateTime;
use Illuminate\Http\Request;
use Validator;
use Session;

class UserController extends Controller
{
    public function index(){
        $list = Usuario::all();

        foreach($list as $key => $user){
            $user['dtNascimento'] = date('d/m/Y', strtotime($user['dtNascimento']));
            $user['senha'] = "******";
            $list[$key] = $user;
        }

        return view('site.listUsers.listaUsuarios', compact('list'));
    }

    public function templateCreate(){
        return view('site.listUsers.createUser');
    }

    public function create(Request $request){

        //regras de validação
        $validator = Validator::make($request->all(), [
            'nome'         => 'required|',
            'email'        => 'required|email|',
            'senha'        => 'required|',
            'dtNascimento' => 'required|',
        ]);

        if ($validator->fails())
        {
            Session::flash('msgErro', 'Por favor preencha todos os campos.');
            return view('site.listUsers.showUsuario', compact('user'));
        }

        $dtNascimento = date('Y-m-d', strtotime($request->input('dtNascimento')));
        $dtNascimento1 = $dtNascimento;

        $dtNascimento = new DateTime($dtNascimento);
        $dataAtual = new DateTime();
        $diferenca = $dtNascimento->diff($dataAtual);

        if($diferenca->y <= 150){
            Session::flash('msgErro', 'Você não poder ter mais que 150 anos.');
            return redirect('/create-user');
        }
        if($diferenca->y <= 1){
            Session::flash('msgErro', 'Coloque sua data de nascimento correta.');
            return redirect('/create-user');
        }


        $user = new Usuario();

        $user->nome         = $request->input('nome');
        $user->email        = $request->input('email');
        $user->senha        = bcrypt($request->input('senha'));
        $user->dtNascimento = $dtNascimento1;
        $user->save();


        Session::flash('msg', 'Usuario criado com sucesso, caso queira já pode editar.');
        $url = "visualizar-user/$user->id";
        return redirect($url);
    }


    public function show($id)
    {
        $user = Usuario::find($id);
        if(empty($user)){
            Session::flash('msgErro', 'Não existe este usuario em nosso sistema.');
            return view('site.listUsers.createUser', compact('user'));
        }

        $user['senha'] = "******";
        $user->dtNascimento = date('d/m/Y', strtotime($user->dtNascimento));

        return view('site.listUsers.showUsuario', compact('user'));
    }

    public function atualizarUsuario(Request $request, $id){

        $user = Usuario::find($id);

        if(empty($user)){
            Session::flash('msgErro', 'Não existe este usuario em nosso sistema.');
            return view('site.listUsers.createUser', compact('user'));
        }

        //regras de validação
        $validator = Validator::make($request->all(), [
            'nome'         => 'required|',
            'email'        => 'required|email|',
            'senha'        => 'required|',
            'dtNascimento' => 'required|',
        ]);

        if ($validator->fails())
        {
            Session::flash('msgErro', 'Por favor preencha todos os campos.');
            return view('site.listUsers.showUsuario', compact('user'));
        }

        $dtNascimento = date('Y-m-d', strtotime($request->input('dtNascimento')));
        $dtNascimento1 = $dtNascimento;

        $dtNascimento = new DateTime($dtNascimento);
        $dataAtual = new DateTime();
        $diferenca = $dtNascimento->diff($dataAtual);

        if($diferenca->y <= 150){
            Session::flash('msgErro', 'Você não poder ter mais que 150 anos.');
            return redirect('/create-user');
        }
        if($diferenca->y <= 1){
            Session::flash('msgErro', 'Coloque sua data de nascimento correta.');
            return redirect('/create-user');
        }

        $user->nome         = $request->input('nome');
        $user->email        = $request->input('email');
        $user->senha        = bcrypt($request->input('senha'));
        $user->dtNascimento = $dtNascimento1;
        $user->save();

        $user['senha'] = "******";
        Session::flash('msg', 'Usuario atualizado com sucesso.');
        return view('site.listUsers.showUsuario', compact('user'));
    }

    public function deletar(Request $request){

        $user = Usuario::find($request->input('id'));

        if(empty($user)){
            Session::flash('msgErro', 'Não existe este usuario em nosso sistema.');
            return view('site.listUsers.createUser', compact('user'));
        }

        $user->delete();
        Session::flash('msg', 'Usuario deletado com sucesso.');
        return redirect('/');
    }


}
