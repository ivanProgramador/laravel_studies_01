<?php

use App\Http\Middleware\endMiddleware;
use App\Http\Middleware\startMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //adicionando middlewares globais para executar antes das rotas
     /*   $middleware->prepend([
            startMiddleware::class,
            endMiddleware::class
        ]); 
      */

        ////adicionando middlewares globais para executar depois das requisições das rotas
      /*  
          $middleware->append([
            startMiddleware::class,
            endMiddleware::class
        ]); 
        */

        /*
         Criando um grupo especifico para ser afetado um um middleware global 
        */

         $middleware->prependToGroup('executar_antes',[
            startMiddleware::class
         ]);




    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
