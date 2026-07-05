<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
       
        return view('public/home', ['title' => 'Início | Unova Team Builder']);
    }
    public function login(): string
    {
        return view('public/login', ['title' => 'Login | Unova Team Builder']);
    }

    public function teams(): string
    {
        return view('teams/index', ['title' => 'Meus Times | Unova Team Builder']);
    }

    public function register(): string
    {
        return view('public/register', ['title' => 'Cadastro | Unova Team Builder']);
    }
}
