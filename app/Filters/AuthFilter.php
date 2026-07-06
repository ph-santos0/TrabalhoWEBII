<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Verifica se o usuário não está logado
        if (!session()->get('logado')) {
            return redirect()->to('/login')->with('erro', 'Você precisa estar logado para acessar esta página.');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Não é necessário implementar nada aqui por enquanto
    }
}