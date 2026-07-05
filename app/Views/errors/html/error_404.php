<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Unova Team Builder</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" rel="stylesheet">

    <style>

        body{
            margin:0;
            background:linear-gradient(180deg,#dceeff,#f8fbff);
            min-height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
            font-family:Segoe UI,Tahoma,Geneva,Verdana,sans-serif;
        }

        .error-card{

            width:700px;
            max-width:95%;
            background:white;
            border-radius:20px;
            overflow:hidden;
            border:4px solid #2f6db8;
            box-shadow:0 15px 35px rgba(0,0,0,.18);

        }

        .card-header{

            background:linear-gradient(90deg,#163f73,#2f6db8);
            color:white;
            padding:15px;
            text-align:center;
            font-size:28px;
            font-weight:bold;

        }

        .card-body{

            padding:40px;
            text-align:center;

        }

        .snorlax{

            width:260px;
            animation:sleep 3s ease-in-out infinite;

        }

        @keyframes sleep{

            0%,100%{
                transform:translateY(0);
            }

            50%{
                transform:translateY(-8px);
            }

        }

        .error-number{

            font-size:90px;
            font-weight:900;
            color:#d62828;
            margin-top:20px;

        }

        .error-title{

            font-size:32px;
            font-weight:bold;
            color:#1d3557;

        }

        .error-text{

            color:#666;
            font-size:18px;
            max-width:550px;
            margin:20px auto;

        }

        .btn-home{

            background:#e63946;
            color:white;
            border:none;
            border-radius:10px;
            padding:14px 35px;
            font-size:18px;
            font-weight:bold;
            transition:.3s;

        }

        .btn-home:hover{

            background:#c1121f;
            color:white;
            transform:translateY(-2px);

        }

        .zzz{

            font-size:30px;
            color:#6c757d;
            animation:float 2s infinite;

        }

        @keyframes float{

            0%{opacity:0;transform:translateY(15px);}
            50%{opacity:1;}
            100%{opacity:0;transform:translateY(-15px);}

        }

    </style>

</head>

<body>

<div class="error-card">

    <div class="card-header">

        Unova Team Builder

    </div>

    <div class="card-body">

        <div class="zzz">💤 Zzz...</div>

        <img class="snorlax"
             src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/143.png"
             alt="Snorlax">

        <div class="error-number">
            404
        </div>

        <div class="error-title">
            Um Snorlax selvagem está bloqueando o caminho!
        </div>

        <p class="error-text">

            <?php if (ENVIRONMENT !== 'production') : ?>

                <?= nl2br(esc($message)) ?>

            <?php else : ?>

                Você tentou acessar uma rota que não existe. Parece que este caminho ainda não foi descoberto na região de Unova.

            <?php endif; ?>

        </p>

        <a href="<?= base_url() ?>" class="btn btn-home">
            <i class="fa-solid fa-house me-2"></i>
            Usar a poké Flauta e voltar para o inicio
        </a>

    </div>

</div>

</body>
</html>