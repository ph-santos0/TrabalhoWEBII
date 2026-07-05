<?php

namespace App\Controllers;
use App\Models\UserModel;
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
    public function processRegister()
    {
        $userModel = new UserModel();

        $nome  = $this->request->getPost('nome');
        $email = $this->request->getPost('email');
        $senha = $this->request->getPost('senha');
        $confirmaSenha = $this->request->getPost('confirma_senha');

        // 1. Verificar se as senhas coincidem 
        if ($senha !== $confirmaSenha) {
            return redirect()->back()->withInput()->with('error', 'As senhas não coincidem!');
        }

        // 2.Checar se o e-mail já existe no banco
        $usuarioExistente = $userModel->where('email', $email)->first();
        
        if ($usuarioExistente) {
            // Se achou alguém com esse e-mail, volta para a tela com erro
            return redirect()->back()->withInput()->with('error', 'Este e-mail já está cadastrado! Tente fazer login ou use outro e-mail.');
        }

        // 3. Montar os dados para salvar
        $dadosUsuario = [
            'nome'  => $nome,
            'email' => $email,
            'senha' => password_hash($senha, PASSWORD_DEFAULT)
        ];

        // 4. Salvar no banco
        if ($userModel->insert($dadosUsuario)) {
            return redirect()->to(base_url('login'))->with('success', 'Cadastro realizado com sucesso! Faça seu login.');
        } else {
            return redirect()->back()->withInput()->with('error', 'Erro ao salvar o usuário no banco de dados.');
        }
    }
}
