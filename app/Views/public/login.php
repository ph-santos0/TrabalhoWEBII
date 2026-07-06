<?= $this->extend('layouts/public') ?>

<?= $this->section('content') ?>

<div class="container d-flex align-items-center justify-content-center" style="min-height: 70vh;">
    <div class="card shadow-lg border-0" style="width: 100%; max-width: 400px;">
        <div class="card-header bg-danger text-white text-center py-3">
    <h4 class="mb-0"><i class="fa-solid fa-right-to-bracket me-2"></i>Fazer Login</h4>
</div>
        <div class="card-body p-4">
            
            <form action="<?= base_url('login/authenticate') ?>" method="post">
                <?= csrf_field() ?>
                
                <div class="mb-3">
                    <label for="email" class="form-label fw-semibold">E-mail do Treinador</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="nome@exemplo.com" required>
                </div>
                
                <div class="mb-3">
                    <label for="password" class="form-label fw-semibold">Senha</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Sua senha secreta" required>
                </div>
                
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="remember">
                        <label class="form-check-label small" for="remember">Lembrar de mim</label>
                    </div>
                    <a href="<?= base_url('forgot-password') ?>" class="text-decoration-none small text-danger">Esqueceu a senha?</a>
                </div>
                
                <button type="submit" class="btn btn-danger w-100 py-2 fw-bold">Entrar</button>
            </form>

            <div class="text-center mt-4">
                <p class="text-muted small">Ainda não tem uma conta? <a href="<?= base_url('register') ?>" class="text-decoration-none fw-semibold">Registre-se</a></p>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>