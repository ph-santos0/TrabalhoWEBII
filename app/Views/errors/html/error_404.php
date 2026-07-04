<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Rota Bloqueada</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .snorlax-img { max-width: 300px; animation: breathe 3s infinite ease-in-out; }
        @keyframes breathe {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }
    </style>
</head>
<body class="d-flex flex-column align-items-center justify-content-center vh-100 text-center">

    <div class="container">
        <img src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/143.png" alt="Snorlax Dormindo" class="img-fluid snorlax-img mb-4 drop-shadow">
        
        <h1 class="display-1 fw-bold text-danger">404</h1>
        <h2 class="h3 mb-3">Um Snorlax selvagem bloqueia o caminho!</h2>
        <p class="text-muted mb-4 fs-5">
            <?php if (ENVIRONMENT !== 'production') : ?>
                <?= nl2br(esc($message)) ?>
            <?php else : ?>
                A página que você está tentando acessar não foi encontrada no banco de dados da Pokédex.
            <?php endif; ?>
        </p>
        
        <a href="<?= base_url() ?>" class="btn btn-primary btn-lg px-4 rounded-pill shadow-sm">
            <i class="fa-solid fa-house me-2"></i>Usar a Poké Flauta e voltar ao Início
        </a>
    </div>

</body>
</html>