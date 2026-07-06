<?php

namespace App\Services;

use App\Models\UserModel;
use CodeIgniter\Config\Services;

class AuthService
{
    protected $userModel;

    public function __construct()
    {
        // Instancia o model para ser usado no serviço
        $this->userModel = new UserModel();
    }

    /**
     * Lógica de Autenticação (Login)
     */
    public function authenticate(string $email, string $password): bool
    {
        // 1. Busca o usuário no banco (ajuste o nome das colunas se necessário)
        $user = $this->userModel->where('email', $email)->first();

        // 2. Verifica se o usuário existe e se a senha bate com o hash
        if ($user && password_verify($password, $user['senha'])) {

            // 3. Inicia a sessão
            $session = session();
            $session->set([
                'id_usuario' => $user['id'],
                'nome'       => $user['nome'],
                'usuario'    => $user,
                'logado'     => true,
            ]);

            return true;
        }

        return false;
    }

    /**
     * Lógica de Logout
     */
    public function logout(): void
    {
        session()->destroy();
    }

    /**
     * Lógica de Recuperação de Senha (Req 11)
     */
    public function processPasswordRecovery(string $email): bool
    {
        $userModel = new \App\Models\UserModel();
        $user = $userModel->where('email', $email)->first();

        if (!$user) return false;

        $token = bin2hex(random_bytes(32));
        $expiresAt = date('Y-m-d H:i:s', strtotime('+1 hour'));

        // Salva o token no banco
        $userModel->update($user['id'], [
            'reset_token' => $token,
            'reset_expires_at' => $expiresAt
        ]);

        // Envia o e-mail
        $emailService = \Config\Services::email();
        $emailService->setTo($email);
        $emailService->setSubject('Recuperação de Senha - Unova Team Builder');
        $emailService->setMessage("Clique no link para redefinir sua senha: " . base_url("reset-senha/{$token}"));

        if ($emailService->send()) {
            return true;
        } else {
            // Mostra na tela o motivo exato de ter falhado!
            echo $emailService->printDebugger(['headers']);
            die();
        }
    }
}
