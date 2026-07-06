<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">

    <style>

        body{
            font-family: DejaVu Sans;
            margin:40px;
        }

        h1{
            text-align:center;
        }

        table{

            width:100%;
            border-collapse:collapse;

        }

        td,th{

            border:1px solid #000;
            padding:8px;

        }

        th{

            background:#eeeeee;

        }

    </style>

</head>

<body>

<h1><?= esc($team['nome']) ?></h1>

<table>

<tr>
<th>Slot</th>
<th>Pokémon</th>
</tr>

<tr>
<td>1</td>
<td><?= esc($team['pokemon1']) ?></td>
</tr>

<tr>
<td>2</td>
<td><?= esc($team['pokemon2']) ?></td>
</tr>

<tr>
<td>3</td>
<td><?= esc($team['pokemon3']) ?></td>
</tr>

<tr>
<td>4</td>
<td><?= esc($team['pokemon4']) ?></td>
</tr>

<tr>
<td>5</td>
<td><?= esc($team['pokemon5']) ?></td>
</tr>

<tr>
<td>6</td>
<td><?= esc($team['pokemon6']) ?></td>
</tr>

</table>

</body>

</html>