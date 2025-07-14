<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
         echo'index';
    }

    public function about(){
        echo 'about';
    }

    public function contact(){
        echo'contact';
    }
}
