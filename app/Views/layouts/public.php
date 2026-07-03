<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Unova Team Builder' ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <style>

        body{
            background: linear-gradient(180deg, #eaf4ff 0%, #ffffff 100%);
        }

        /* NAVBAR */
        .navbar-pokemon{
            background: linear-gradient(90deg, #0b1f3a, #143a66);
            border-bottom: 4px solid #365bf0;
        }

        .navbar-brand img{
            height:55px;
            filter: drop-shadow(0 0 6px rgba(255,255,255,.3));
        }

        .nav-link{
            color:#d7e6ff !important;
            transition:.2s;
        }

        .nav-link:hover{
            color:#ffffff !important;
            transform: translateY(-1px);
        }

        /* BOTÕES */
        .btn-outline-light:hover{
            background:#ffffff;
            color:#143a66;
        }

        .btn-danger{
            background:#ff3b3b;
            border:none;
        }

        .btn-danger:hover{
            background:#e12c2c;
        }

        
        main{
            padding-top:20px;
        }

        /* FOOTER */
        footer{
            background: linear-gradient(90deg, #061225, #0b1f3a);
            color:#b8c7db;
            border-top:3px solid #365bf0;
        }

        footer small{
            color:#8fa3bf;
        }

        .card, .btn{
            transition:.2s ease-in-out;
        }

        .card:hover{
            transform: translateY(-3px);
        }

    </style>
</head>

<body class="d-flex flex-column min-vh-100">

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark navbar-pokemon shadow">

    <div class="container">

        <a class="navbar-brand d-flex align-items-center gap-2" href="<?= base_url() ?>">
            <img src="<?= base_url('img/logo.png') ?>" alt="Logo">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">

            <ul class="navbar-nav align-items-center">

                <li class="nav-item">
                    <a class="nav-link active me-3" href="<?= base_url() ?>">
                        <i class="fa fa-house me-1"></i> Início
                    </a>
                </li>

                <li class="nav-item">
                    <a class="btn btn-outline-light btn-sm px-4 me-2" href="<?= base_url('login') ?>">
                        Entrar
                    </a>
                </li>

                <li class="nav-item">
                    <a class="btn btn-danger btn-sm px-4" href="<?= base_url('register') ?>">
                        Cadastrar
                    </a>
                </li>

            </ul>

        </div>

    </div>

</nav>


<main class="flex-grow-1">
    <?= $this->renderSection('content') ?>
</main>

<footer class="py-4 mt-auto">

    <div class="container text-center">

        <p class="mb-1">
            &copy; <?= date('Y') ?> Unova Team Builder - IFMG
        </p>

        <small>
            Projeto educacional inspirado em Pokémon Black & White • Nintendo / Game Freak
        </small>

    </div>

</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>