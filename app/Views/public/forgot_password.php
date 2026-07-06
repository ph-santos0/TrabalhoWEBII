<?= $this->extend('layouts/public') ?>

<?= $this->section('content') ?>
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-danger text-white text-center py-3">
                    <h4 class="mb-0">Recuperar Senha</h4>
                </div>
                <div class="card-body p-4">
                    <?php if (session()->getFlashdata('erro')): ?>
                        <div class="alert alert-danger"><?= session()->getFlashdata('erro') ?></div>
                    <?php endif; ?>
                    <?php if (session()->getFlashdata('sucesso')): ?>
                        <div class="alert alert-success"><?= session()->getFlashdata('sucesso') ?></div>
                    <?php endif; ?>

                    <form action="<?= base_url('forgot-password') ?>" method="post">
                        <?= csrf_field() ?>
                        <div class="mb-3">
                            <label for="email" class="form-label">E-mail cadastrado</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <button type="submit" class="btn btn-danger w-100">Enviar link de recuperação</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>