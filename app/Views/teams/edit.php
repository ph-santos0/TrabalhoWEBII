<?= $this->extend('layouts/public') ?>

<?= $this->section('content') ?>

<style>

body{
    background:linear-gradient(180deg,#e9f3ff 0%,#ffffff 100%);
}

.slot{
    border:2px dashed #3b82f6;
    border-radius:15px;
    padding:20px;
    text-align:center;
    background:white;
    transition:.2s;
    min-height:260px;
}

.slot:hover{
    transform:translateY(-5px);
    box-shadow:0 8px 20px rgba(0,0,0,.08);
}

.poke-card{
    cursor:pointer;
    transition:.2s;
}

.poke-card:hover{
    transform:scale(1.05);
    border:2px solid #0d6efd;
}

</style>

<div class="container my-5">

<div class="d-flex justify-content-between align-items-center mb-4">

<h2>

<i class="fa-solid fa-pen text-primary"></i>

Editar <?= esc($team['nome']) ?>

</h2>

<a href="<?= site_url('dashboard') ?>" class="btn btn-secondary">
    <i class="fa-solid fa-arrow-left"></i> Voltar
</a>

</a>

</div>

<form action="<?= site_url('teams/editar/'.$team['id']) ?>" method="post">
    <?= csrf_field() ?>

<div class="card shadow">

<div class="card-body">

<div class="mb-4">

<label class="form-label">

Nome do Time

</label>

<input
type="text"
name="nome"
class="form-control"
value="<?= esc($team['nome']) ?>">

</div>

<div class="row">

<?php for($i=1;$i<=6;$i++): ?>

<div class="col-md-4 mb-4">

<div class="slot">

<img
id="img<?= $i ?>"
src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/items/poke-ball.png"
width="90">

<h5 class="mt-3">

Slot <?= $i ?>

</h5>

<input
type="hidden"
id="pokemon<?= $i ?>"
name="pokemon<?= $i ?>"
value="<?= esc($team['pokemon'.$i]) ?>">

<p
id="nome<?= $i ?>"
class="fw-bold">

<?= esc($team['pokemon'.$i]) ?: 'Nenhum Pokémon' ?>

</p>

<button
type="button"
class="btn btn-primary btn-sm"
onclick="abrirModal(<?= $i ?>)">

<i class="fa-solid fa-repeat"></i>

Adicionar/Alterar

</button>

<button
type="button"
class="btn btn-danger btn-sm"

onclick="removerPokemon(<?= $i ?>)">

<i class="fa-solid fa-trash"></i>

Remover

</button>

</div>

</div>

<?php endfor; ?>

</div>

<div class="text-end">

<button type="submit" class="btn btn-success btn-lg">

<i class="fa-solid fa-floppy-disk"></i>

Salvar Time

</button>

</div>

</div>

</div>

</form>

</div>


<div class="modal fade" id="pokemonModal">

<div class="modal-dialog modal-xl modal-dialog-scrollable">

<div class="modal-content">

<div class="modal-header bg-danger text-white">

<h5>

Escolha um Pokémon

</h5>

<button
class="btn-close btn-close-white"
data-bs-dismiss="modal">

</button>

</div>

<div class="modal-body">

<div class="row">

<?php foreach($pokemons as $poke): ?>

<div class="col-4 col-md-2 mb-3">

<div
class="card text-center poke-card"

onclick="selecionarPokemon(
<?= $poke['id'] ?>,
'<?= esc($poke['name']) ?>',
'<?= esc($poke['sprite']) ?>'
)">

<img
src="<?= esc($poke['sprite']) ?>"
class="img-fluid p-2">

<div class="card-body">

<b>

<?= ucfirst($poke['name']) ?>

</b>

</div>

</div>

</div>

<?php endforeach; ?>

</div>

</div>

</div>

</div>

<script>

let slotAtual=1;

function abrirModal(slot){

slotAtual=slot;

new bootstrap.Modal(document.getElementById('pokemonModal')).show();

}

function selecionarPokemon(id,nome,sprite){

document.getElementById('pokemon'+slotAtual).value=id;

document.getElementById('nome'+slotAtual).innerHTML=nome;

document.getElementById('img'+slotAtual).src=sprite;

bootstrap.Modal.getInstance(document.getElementById('pokemonModal')).hide();

}

function removerPokemon(slot){

document.getElementById('pokemon'+slot).value='';

document.getElementById('nome'+slot).innerHTML='Nenhum Pokémon';

document.getElementById('img'+slot).src='https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/items/poke-ball.png';

}

</script>

<?= $this->endSection() ?>