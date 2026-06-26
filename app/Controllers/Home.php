<?php

namespace App\Controllers;

class Home extends BaseController
{
    //função para aderir título às páginas
    private $dadosCabecalho;

    public function initController($request, $response, $logger)
    {
        
        parent::initController($request, $response, $logger);

        $this ->dadosCabecalho = [
            "titulo" => 'TeamBuilder'
        ];
        
    }

    public function index(): string
    {
        return view('welcome_message');
    }

    //view mesclada referente à página home
    public function home(): string
    {
        return view('header', $this->dadosCabecalho).
               view('home_content').
               view('footer');
    }
}
