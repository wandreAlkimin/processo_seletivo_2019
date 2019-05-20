<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;


class NoticiasController extends Controller
{
    public function index(Request $request){

        //Verifica se as parametros na URL
        $numPage = Input::get('page');
        if(isset($numPage)){
            $page = "?page=$numPage";
        }else{
            $page = "";
        }

        $valueSearch = Input::get('pesquisa');
        if(isset($valueSearch)){
            $pesquisa = "?pesquisa=$valueSearch";
        }else{
            $pesquisa = "";
        }

        //Faz o get na url com ou sem parametros
        $endpoint = "http://www.marcha.cnm.org.br/webservice/noticias$pesquisa$page";
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', $endpoint);
        $content = $response->getBody()->getContents();

        //Recebe o json e transforma em array
        $noticias = json_decode($content, true);

        //Verifica se existe as informaçoes
        if(isset($noticias['noticias'])){

            // Cria a paginação
            $totalNoticias = $noticias['total_noticias'];
            $qtdPaginas = $totalNoticias/15;
            $qtdPaginas = ceil($qtdPaginas);
            $qtdPaginas = intval($qtdPaginas);

            $qtdPages = [];
            for ($i = 1; $i <= $qtdPaginas; $i++) {

                $qtdPages[$i] = $i;
                if($numPage == $i){
                    $qtdPages[$i] = true;
                }else{
                    $qtdPages[$i] = false;
                }
            }

            //Obriga o numero de paginas ser 1, pois o filtro da url não aceita dois parametros ao mesmo tempo.
            if(isset($valueSearch)){
                $qtdPaginas = 1;
            }

            //Limita o texto do array em 300 caracteres
            $noticias = $noticias['noticias'];
            foreach($noticias as $key => $noticia){
                $noticias[$key]['texto'] = $this->replaceText($noticia['texto']);
            }

        }else{
            $noticias = [];
            $qtdPages = [];
        }

        return view('index', compact('noticias','qtdPages','valueSearch'));
    }


    public function replaceText($texto){

        //Exclui tudo que está entre < >
        $resultado = preg_replace("/<.*?>/", "", $texto) ;

        //Limita os caracteres para 297
        $resultado = substr($resultado,0,297);

        $resultado = $resultado."...";

        return $resultado;
    }

}
