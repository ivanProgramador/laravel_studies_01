<?php

use App\Http\Controllers\MainController;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Route;

/*
Assinatura básica de uma rota, primeiro a classe Route é acionada e esse classe possui os metodos com os nomes 
dos verbos http, cada metodos desses em uma rota basica recebe 2 parametros
1 - a url
2 - a função de call back que vai dizer oque acontece quando essa rota é requisitada     
*/

Route::get('/', function () {
    echo '<h1> Olá, sou uma rota basica</h1>';
});

/*
 A diferença entre as ações é definida tanto pelo pre-fixo do link '/user' quanto pelo verbo http em questão
 essa é um rota dop tipo get mas o prefixo dela e oque a função anonima faz ~sao coisas diferentes  
*/

Route::get('/user', function () {
    echo '<h1> esses são os dados do usuário </h1>';
});

/*
  Em alguns casos dependendo do contexto vai ser necessário pegar os dados da requisição
  seja pra autenticar um usuario ou pra revisar alguns dados, nesse caso embora a rota abaixo 
  seja um get ela esta pegando os dados da requisição e imprimindo. 
*/
Route::get('/injetion', function (Request $request) {
    echo '<h1>' . $request . '</h1>';
});

/*
 Outra forma de imprimir os dados da requisição
*/
Route::get('/injection', function (Request $request) {
    var_dump($request);
});

/*
Rotas multi verbo http no caso da rota abaixo ela tanto aceita get como aceita post 

*/
Route::match(['get', 'post'], '/match', function (Request $request) {

    echo 'Aceita get e post';
});

/*
 Existe também a rota que aceita qualquer método
 colocando uma rota do tipo any ela pode ser acessada de um 
 formulario ou link ou busca quem decide o verbo a ser executado  é a requisição 
*/

Route::any('/any', function (Request $request) {

    echo '<h1>Ceita qualquer verbo http </h1>';
});

/*
  Rotas que acionam metodos do controller, nesse caso o primiero parametro continua sendo 
  uma url, mas o segundo recebe um array de duas posições, a primeira recebe o controller 
  que eu tenho que avisar que se trata de uma classe, senão o laravel vai pensar que isso 
  é so uma constante e constante por si só não tem os metodos about e index que estão no 
  controller, no segundo indice eu cooco o nome do metodo que esta no meu controller que 
  eu desejo acessar e seja oque for que estiver dentro desse metodo será executado.
*/

Route::get('/index', [MainController::class, 'index']);
Route::get('/about', [MainController::class, 'about']);

/*
 Rota de redirecionamento Temporario
 É utilizada em casos de manutenção de sites ou sistemas 
 esse tipo de rota deve ser usada para levar o cliente a uma página de aviso
 e o SEO entende que em algum momento essa rota vai ser descartada
 301 - redirecionamento temporario  

*/

Route::redirect('/saltar', '/index');

/*
  É um rota que substitui a antiga em qualquer requisição
  serve para qualndo seu site ou sistema muda o endereço 
  ou url , ela avisa ao SEO que a rota antiga não vai mais 
  ser usada e esse redirreciomento e permanente 
  302 - redireciomento definitivo 

*/

Route::permanentRedirect('/saltar2', '/index');

/*
Passando dados pela rota 
*/

Route::view('/view','home',['nome'=>'Ivan Rodrigues']);



//parametros de rotas 

Route::get('/valor/{value}',[MainController::class,'mostrarValor']);

Route::get('/valores/{value1}/{value2}',[MainController::class,'mostrarValores']);

//rota com valores opcionais, quam dedine se o valor é opcional ou não é ponto de interrogação no final dele 

Route::get('/opcional/{value1?}',[MainController::class,'mostrarValorOpcional']);

//no caso dessa rota tem um valor opcional e outro obrigatorio 

Route::get('/opcional2/{value1}/{value?}',[MainController::class,'mostrarValorOpcional2']);

//Rota com restrições (constraints)
/*
 Isso serve para um contexto onde eu precise definir uma rota que espera apenas numeros 
 ou letras, por exemplo se eu queiser receber apenas o id de um usuario eu preciso denfinir
 uma restrição que impeça que qualquer outro dado alem desse seja porcessado pelo controller
 associado a essa rota.
 
 Para definirr uma restrição desse tipo eu tenho que usarr a função "where()" essa função recebe 
 2 parametros:

 1 - oque eu vou avaliar 
 2 - oque eu quero receber  

  No caso eu vou avaliar o value, e quero recber numeros 1 a 9 ou maiores. Como não exsitem letras 
  inclusas no segundo parametro se o usuario enviar ele vai receber um 404 indiica que a rota não foi 
  encontrada.    
*/

//apenas numeros 
Route::get('/exp1/{value}',function($value){
   echo $value;
})->where('value','[1-9]+');

//strings alfa numericas na função where diz que a rota pode receber 
//letras  a a z maiusculas e minusculas e numerros dde 1 a 9 ou maiores que isso
//mas não aceita caracteres especiais.

Route::get('/exp2/{value}',function($value){
   echo $value;
})->where('value','[A-Z a-z 1-9]+');


//definindo restriçoes para cada parametro da rota 
//no caso a função Where recebe um array associativo
//e define as regas de restrição de forma separada para cada valor  

Route::get('/exp3/{value1}/{value2}',function($value){
   echo $value;
})->where([
   'value1'=>'[1-9]+',
   'value2'=>'[A-Z a-z 1-9]+'
]);








































