<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class MainController extends Controller
{
    //coloquei uma string do lado da função pra avisar que esse metodo retorna uma string 
    //caso ele retornasse apenas um echo eu teria de colocar "void" não é obrigatório especificar   
    // mas torna o codigo mais consistente quando se sabe oque esperar de um método. 

    public function initMethod():string 
    {
        return 'Hello World';
    }

    //Nesse caso esse metodo vai retornar um componente da classe view
    //então o retorno tem que ser do tipo view 

    public function viewPage():View 
    {
        return view('home');
    }


}
