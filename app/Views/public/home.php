<?= $this->extend('layouts/public') ?>

<?= $this->section('content') ?>

<style>

body{
    background:#edf4ff;
    background-image:
    radial-gradient(circle at top,#ffffff 0%,#d6ebff 100%);
}

/* Banner principal */

.hero{

    border:5px solid #4ea1ff;
    border-radius:18px;
    overflow:hidden;
    background:white;
    box-shadow:0 10px 30px rgba(0,0,0,.15);

}

.hero-top{

    background:linear-gradient(90deg,#2962ff,#58c2ff);
    color:white;
    padding:12px 20px;
    font-size:26px;
    font-weight:bold;

}

.hero-content{

    position:relative;
    min-height:600px;
    padding:40px;

    background-image:url("https://archives.bulbagarden.net/media/upload/a/a7/Unova_alt.png");
    background-size:contain;
    background-repeat:no-repeat;
    background-position:center;

}

.logo{

    width:350px;
    max-width:80%;
    margin-bottom:20px;

}

.center{

    text-align:center;
    position:relative;
    z-index:5;

}

.center h1{

    font-size:55px;
    font-weight:900;
    color:#1d3557;

}

.center p{

    color:#555;
    font-size:20px;
    max-width:650px;
    margin:auto;

}

.btn-start{

    background:#ff4040;
    color:white;
    border:none;
    font-size:22px;
    padding:15px 45px;
    border-radius:10px;
    margin-top:30px;

}

.btn-start:hover{

    background:#dd2f2f;
    color:white;

}

.legend{

    position:absolute;
    width:200px;
    transition:.4s;

}

.legend:hover{

    transform:scale(1.08);

}

.left{

    bottom:15px;
    left:20px;

}

.right{

    bottom:15px;
    right:20px;

}

/* Painel lateral */

.side{

    background:white;
    border:5px solid #4ea1ff;
    border-radius:18px;
    overflow:hidden;
    box-shadow:0 10px 30px rgba(0,0,0,.15);

}

.side-title{

    background:linear-gradient(90deg,#2962ff,#58c2ff);
    color:white;
    padding:12px;
    text-align:center;
    font-weight:bold;

}

.pokemon{

    display:flex;
    align-items:center;

    margin:15px;

    padding:10px;

    border:2px solid #4ea1ff;

    border-radius:10px;

    transition:.3s;

    background:white;

}

.pokemon:hover{

    background:#eef8ff;
    transform:scale(1.03);

}

.pokemon img{

    width:75px;
    margin-right:12px;

}

/* Starters */

.starters{

    margin-top:40px;

    border:5px solid #4ea1ff;

    border-radius:18px;

    overflow:hidden;

    background:white;

    box-shadow:0 10px 30px rgba(0,0,0,.15);

}

.starters-title{

    background:linear-gradient(90deg,#2962ff,#58c2ff);

    color:white;

    padding:15px;

    text-align:center;

    font-size:26px;

    font-weight:bold;

}

.starter{

    padding:30px;

    text-align:center;

    transition:.3s;

}

.starter:hover{

    background:#eef8ff;

}

.starter img{

    width:140px;

}

</style>

<div class="container my-5">

<div class="row">

<div class="col-lg-9">

<div class="hero">

<div class="hero-top">

⭐ UNOVA TEAM BUILDER

</div>

<div class="hero-content">

<img class="legend left"
src="https://img.pokemondb.net/sprites/black-white/anim/normal/reshiram.gif">

<img class="legend right"
src="https://img.pokemondb.net/sprites/black-white/anim/normal/zekrom.gif">

<div class="center">

<img class="logo"
         src="<?= base_url('img/logo.png') ?>"
         alt="Logo Unova">

<h1>Monte seu Time</h1>

<p>

Crie equipes usando apenas Pokémon da região de Unova.
Salve seus times, experimente estratégias e monte sua equipe perfeita
para Pokémon Black & White.

</p>

<a href="<?= base_url('login') ?>"
class="btn btn-start shadow">

Começar Agora

</a>

</div>

</div>

</div>

</div>

<div class="col-lg-3">

<div class="side">

<div class="side-title">

Pokémon Iniciais

</div>

<div class="pokemon">

<img src="https://img.pokemondb.net/sprites/black-white/anim/normal/snivy.gif">

<div>

<b>Snivy</b><br>

Grama

</div>

</div>

<div class="pokemon">

<img src="https://img.pokemondb.net/sprites/black-white/anim/normal/tepig.gif">

<div>

<b>Tepig</b><br>

Fogo

</div>

</div>

<div class="pokemon">

<img src="https://img.pokemondb.net/sprites/black-white/anim/normal/oshawott.gif">

<div>

<b>Oshawott</b><br>

Agua

</div>

</div>

<div class="pokemon">

🎮 <b>156 Pokémon disponíveis em Unova</b>

</div>

</div>

</div>

</div>

<div class="starters">

<div class="starters-title">


</div>

</div>

<?= $this->endSection() ?>