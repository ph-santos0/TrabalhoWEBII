<?php

namespace App\Controllers;

/**
 * Controller responsável pelas páginas públicas e pelo dashboard inicial.
 */
class Home extends BaseController
{
    /**
     * Página inicial pública do sistema.
     * (Requisito 6 - Página principal acessível sem autenticação)
     */
    public function index(): string
    {
        return view('public/home', ['title' => 'Início | Unova Team Builder']);
    }

    /**
     * Dashboard do usuário logado.
     * Esta rota deve ser protegida pelo filtro 'auth' nas rotas.
     */
    public function dashboard(): string
    {
        return view('teams/index', ['title' => 'Dashboard | Unova Team Builder']);
    }

    /**
     * Página de listagem de times.
     */
    public function teams(): string
    {
        return view('teams/index', ['title' => 'Meus Times | Unova Team Builder']);
    }
}