<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        // O CodeIgniter vai buscar o arquivo app/Views/public/home.php
        // Esse arquivo, por sua vez, carrega o layout em app/Views/layouts/public.php
        return view('public/home', ['title' => 'Início | Unova Team Builder']);
    }
    public function login(): string
    {
        return view('public/login', ['title' => 'Login | Unova Team Builder']);
    }

    // A área restrita (Teams)
    public function teams(): string
    {
        // Aqui, futuramente, passaremos os dados dos times
        return view('teams/index', ['title' => 'Meus Times | Unova Team Builder']);
    }
}
