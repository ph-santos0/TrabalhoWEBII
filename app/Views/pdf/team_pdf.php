<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Equipe - <?= esc($team['nome']) ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #0b1f3a;
        }
        .cabecalho {
            text-align: center;
            border-bottom: 3px solid #365bf0;
            padding-bottom: 10px;
            margin-bottom: 30px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #b8c7db;
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #eaf4ff;
            color: #143a66;
        }
        .rodape {
            text-align: center;
            margin-top: 40px;
            font-size: 12px;
            color: #8fa3bf;
        }
    </style>
</head>
<body>

    <div class="cabecalho">
        <h1>Unova Team Builder</h1>
        <h2>Relatório de Equipe: <?= esc($team['nome']) ?></h2>
    </div>

    <table>
        <thead>
            <tr>
                <th>Slot</th>
                <th>Pokémon</th>
            </tr>
        </thead>
        <tbody>
            <?php for ($i = 1; $i <= 6; $i++): ?>
                <tr>
                    <td>Pokémon <?= $i ?></td>
                    <td><?= !empty($team['pokemon' . $i]) ? esc($team['pokemon' . $i]) : '<em>Vazio</em>' ?></td>
                </tr>
            <?php endfor; ?>
        </tbody>
    </table>

    <div class="rodape">
        <p>Documento gerado em <?= date('d/m/Y \à\s H:i') ?></p>
    </div>

</body>
</html>