<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
         echo'index';
    }

    public function about(){
         echo'about';
    }

    public function mostrarValor($valor){
         echo'valor vindo da rota '.$valor;
    }

    public function mostrarValores($valor1,$valor2){
         echo'valores vindos da rota '.$valor1.' e '.$valor2;
    }

    //se o valor não for enviado ele vai ficar como nulo 
    public function mostrarValorOpcional($valor = null){
         echo 'valor opcional vindo da rota '.$valor;
    }

    //se o valor não for enviado ele vai ficar como nulo 
    //é importante que um valor default seja definido mesmo que seja um vaor nulo pra evitar 
    //que a aplicação mostre erros ou travamentos para cliente visando evitar que o sistema perca credibilidade.

    public function mostrarValorOpcional2($valor1,$valor2 = null){
         echo 'Esse varor e obrigatorio : '.$valor1.' esse aqui não é : '.$valor2;
    }
}
