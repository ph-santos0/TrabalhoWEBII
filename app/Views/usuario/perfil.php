<?= $this->extend('layouts/public') ?>

<?= $this->section('content') ?>

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card shadow border-0">

                <div class="card-body p-5">

                    <div class="text-center mb-5">

                        <i class="fa-solid fa-circle-user text-danger" style="font-size:100px;"></i>

                        <h2 class="mt-3">
                            <?= esc(session()->get('nome')) ?>
                        </h2>

                        <p class="text-muted">
                            Área do usuário
                        </p>

                    </div>

                    <hr class="mb-4">

                    <div class="row g-4">

                        <div class="col-md-6">
                            <div class="card h-100">

                                <div class="card-body text-center">

                                    <i class="fa-solid fa-users fa-3x text-danger mb-3"></i>

                                    <h4>Meu Time</h4>

                                    <p class="text-muted">
                                        Visualize as informações do seu time.
                                    </p>

                                    <a href="<?= base_url('meu-time') ?>" class="btn btn-outline-danger">
                                    <i class="fa-solid fa-users me-2"></i>
                                            Ver Meu Time
                                    </a>

                                </div>

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card h-100">

                                <div class="card-body text-center">

                                    <i class="fa-solid fa-right-from-bracket fa-3x text-danger mb-3"></i>

                                    <h4>Logout</h4>

                                    <p class="text-muted">
                                        Encerrar sua sessão.
                                    </p>

                                    <a href="<?= base_url('logout') ?>" class="btn btn-danger">
                                        Sair
                                    </a>

                                </div>

                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<?= $this->endSection() ?>