<?php

namespace App\Controllers;

use App\Services\AuthService;
use App\Models\UserModel;

class UserController extends BaseController
{
    protected $authService;

    public function __construct()
    {
        $this->authService = new AuthService();
    }

    public function login()
    {
        if ($this->request->getMethod() === 'POST') {
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            if ($this->authService->authenticate($email, $password)) {
                return redirect()->to('/dashboard');
            }

            return redirect()->back()->with('erro', 'E-mail ou senha inválidos.');
        }

        return view('public/login', ['title' => 'Login | Unova Team Builder']);
    }

    public function register()
    {
        if ($this->request->getMethod() === 'POST') {
            $userModel = new UserModel();

            $nome  = $this->request->getPost('nome');
            $email = $this->request->getPost('email');
            $senha = $this->request->getPost('senha');
            $confirma = $this->request->getPost('confirma_senha'); // Ajuste conforme seu form

            // Validação de senha
            if ($senha !== $confirma) {
                return redirect()->back()->withInput()->with('erro', 'As senhas não coincidem.');
            }

            $data = [
                'nome'  => $nome,
                'email' => $email,
                'senha' => password_hash((string) $senha, PASSWORD_DEFAULT),
            ];

            if ($userModel->insert($data)) {
                return redirect()->to('/login')->with('sucesso', 'Cadastro realizado com sucesso!');
            }

            return redirect()->back()->withInput()->with('erro', 'Erro ao realizar cadastro.');
        }

        return view('public/register', ['title' => 'Cadastro | Unova Team Builder']);
    }

    public function logout()
    {
        $this->authService->logout();
        return redirect()->to('/login')->with('sucesso', 'Você saiu do sistema.');
    }

    public function forgotPassword()
    {
        if ($this->request->getMethod() === 'POST') {
            $email = $this->request->getPost('email');

            // Instancia o seu serviço de autenticação
            $authService = new \App\Services\AuthService();

            if ($authService->processPasswordRecovery(trim($email))) {
                return redirect()->back()->with('sucesso', 'As instruções de recuperação foram enviadas para o seu e-mail!');
            } else {
                return redirect()->back()->with('erro', 'E-mail não encontrado no sistema.');
            }
        }

        return view('public/forgot_password');
    }

    public function resetPassword($token = null)
    {
        $userModel = new \App\Models\UserModel();
        $user = $userModel->where('reset_token', $token)
            ->where('reset_expires_at >=', date('Y-m-d H:i:s'))
            ->first();

        if (!$user) {
            return redirect()->to('/login')->with('erro', 'Token inválido ou expirado.');
        }

        if ($this->request->getMethod() === 'POST') {
            $userModel->update($user['id'], [
                'senha' => password_hash($this->request->getPost('senha'), PASSWORD_DEFAULT),
                'reset_token' => null, // Limpa o token após uso
                'reset_expires_at' => null
            ]);
            return redirect()->to('/login')->with('sucesso', 'Senha alterada com sucesso!');
        }

        return view('public/reset_password', ['token' => $token]);
    }






    

     public function perfil()
{
    if (!session()->get('logado')) {
        return redirect()->to('/login');
    }

    return view('usuario/perfil');
}
}
