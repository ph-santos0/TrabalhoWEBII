<?= $this->extend('layouts/public') ?>

<?= $this->section('content') ?>

<style>
    /* Estilo do Card de Autenticação */
    .auth-card {
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        border: none;
        overflow: hidden;
    }
    
    .auth-header {
        background: linear-gradient(135deg, #ff4040, #dd2f2f); /* Vermelho Pokémon */
        color: white;
        padding: 25px;
        text-align: center;
    }

    .form-control {
        border-radius: 10px;
        padding: 12px 15px;
    }

    .btn-register {
        background: #2962ff;
        color: white;
        border-radius: 10px;
        padding: 12px;
        font-weight: bold;
        font-size: 18px;
        transition: 0.3s;
    }

    .btn-register:hover {
        background: #1a3a99;
        color: white;
        transform: translateY(-2px);
    }
</style>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            
            <div class="card auth-card">
                <div class="auth-header">
                    <h3 class="fw-bold mb-1"><i class="fas fa-user-plus me-2"></i>Cadastro</h3>
                    <p class="mb-0 opacity-75">Comece sua jornada em Unova</p>
                </div>

                <div class="card-body p-4 p-md-5 bg-white">
                    

 <?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger border-0 shadow-sm rounded-3 text-center">
        <?= session()->getFlashdata('error') ?>
    </div>
<?php endif; ?>
                    
                    <form action="<?= base_url('register/process') ?>" method="POST">
                        
                        <div class="mb-3">
                            <label for="nome" class="form-label text-muted fw-bold">Nome Completo</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="fas fa-user"></i></span>
                                <input type="text" class="form-control" id="nome" name="nome" placeholder="Treinador Pokémon" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label text-muted fw-bold">E-mail</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="fas fa-envelope"></i></span>
                                <input type="email" class="form-control" id="email" name="email" placeholder="seu@email.com" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="senha" class="form-label text-muted fw-bold">Senha</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="fas fa-lock"></i></span>
                                <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite " required>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="confirma_senha" class="form-label text-muted fw-bold">Confirmar Senha</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="fas fa-check-circle"></i></span>
                                <input type="password" class="form-control" id="confirma_senha" name="confirma_senha" placeholder="Repita a senha" required>
                            </div>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-register shadow-sm">Criar Conta</button>
                        </div>

                    </form>

                    <div class="text-center mt-4 pt-3 border-top">
                        <span class="text-muted">Já tem uma conta?</span>
                        <a href="<?= base_url('login') ?>" class="text-decoration-none fw-bold text-danger">Faça Login</a>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

<?= $this->endSection() ?>