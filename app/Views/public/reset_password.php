<?= $this->extend('layouts/public') ?>

<?= $this->section('content') ?>
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-danger text-white text-center py-3">
                    <h4 class="mb-0">Definir Nova Senha</h4>
                </div>
                <div class="card-body p-4">
                    <form action="<?= base_url('reset-senha/' . $token) ?>" method="post">
                        <?= csrf_field() ?>

                        <div class="mb-3">
                            <label for="senha" class="form-label">Nova Senha</label>
                            <input type="password" class="form-control" id="senha" name="senha" required>
                        </div>

                        <div class="mb-3">
                            <label for="confirma_senha" class="form-label">Confirmar Senha</label>
                            <input type="password" class="form-control" id="confirma_senha" name="confirma_senha" required>
                        </div>

                        <button type="submit" class="btn btn-danger w-100">Atualizar Senha</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
