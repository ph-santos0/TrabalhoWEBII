<?= $this->extend('layouts/public') ?>

<?= $this->section('content') ?>

<style>
/* FUNDO estilo Pokédex */
body{
    background: linear-gradient(180deg, #e9f3ff 0%, #ffffff 100%);
    background-color:#eaf4ff;
    position:relative;
}

/* Fundo */
body::before{
    content:"";
    position:fixed;
    top:0;
    left:0;
    width:100%;
    height:100%;
    background-image:url("https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/items/poke-ball.png");
    background-size:90px;
    opacity:0.4;
    pointer-events:none;
    z-index:-1;
}

/* TÍTULO PRINCIPAL */
.page-title{
    font-weight:900;
    color:#1d3557;
}

/* BOTÃO PRINCIPAL */
.btn-pokemon{
    background: linear-gradient(90deg, #ff3b3b, #ff6b6b);
    border:none;
    color:white;
    font-weight:bold;
    box-shadow:0 4px 10px rgba(255,0,0,.2);
}

.btn-pokemon:hover{
    transform: translateY(-2px);
    background: linear-gradient(90deg, #e22b2b, #ff4a4a);
}

/* CARD DO TIME (estilo jogo) */
.team-card{
    border:4px solid #3b82f6;
    border-radius:18px;
    overflow:hidden;
    background:white;
    box-shadow:0 10px 25px rgba(0,0,0,.08);
}

/* HEADER estilo “HUD de jogo” */
.team-header{
    background: linear-gradient(90deg, #1e3a8a, #3b82f6);
    color:white;
    padding:12px 16px;
    font-weight:bold;
    display:flex;
    justify-content:space-between;
    align-items:center;
}

/* BOTÕES pequenos estilo game */
.icon-btn{
    border:none;
    background:rgba(255,255,255,.15);
    color:white;
    padding:6px 10px;
    border-radius:8px;
    transition:.2s;
}

.icon-btn:hover{
    background:rgba(255,255,255,.3);
    transform:scale(1.05);
}

/* SLOT estilo Pokémon party */
.slot{
    background: linear-gradient(180deg, #ffffff, #f1f6ff);
    border:2px dashed #94a3b8;
    border-radius:12px;
    min-height:120px;
    display:flex;
    flex-direction:column;
    justify-content:center;
    align-items:center;
    transition:.2s;
}

.slot:hover{
    border-color:#3b82f6;
    transform:translateY(-3px);
    background:#eef6ff;
}

/* ícone  Nintendo */
.slot i{
    font-size:28px;
    opacity:.5;
}

/* CORES por time estilo Pokémon */
.team-red .team-header{
    background: linear-gradient(90deg, #d14747, #921010);
}

.team-blue .team-header{
    background: linear-gradient(90deg, #5d80e2, #194285);
}

.team-green .team-header{
    background: linear-gradient(90deg, #3bcf6f, #12622f);
}

/* CARD DE SELEÇÃO DA API NO MODAL */
.poke-select-card {
    border: 2px solid transparent;
    transition: 0.2s ease-in-out;
}
.poke-select-card:hover {
    border-color: #3b82f6;
    transform: scale(1.1);
    background: #f1f6ff !important;
}
</style>

<div class="container my-5">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="page-title">
            <i class="fa-solid fa-gamepad text-danger me-2"></i>
            Pokémon Team Builder - Unova
        </h2>

        <button class="btn btn-pokemon" data-bs-toggle="modal" data-bs-target="#searchPokemonModal">
            <i class="fa-solid fa-magnifying-glass me-2"></i>
            Buscar Pokémon
        </button>
    </div>
    <?php
    $redTeam   = $times[0] ?? null;
    $blueTeam  = $times[1] ?? null;
    $greenTeam = $times[2] ?? null;
    ?>
   
    
   <div class="team-card team-red mb-4">

    <div class="team-header d-flex justify-content-between align-items-center">

        <div class="d-flex align-items-center gap-2">
            <!-- macaco fogo -->
            <img src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/versions/generation-v/black-white/animated/513.gif"
                 style="width:40px; height:40px;">

            <span>🔥 Red Team</span>

        </div>

        <!-- BOTÕES -->
        <div>
           <a href="<?= site_url('teams/edit/'.$redTeam['id']) ?>" class="icon-btn text-decoration-none">
    <i class="fa-solid fa-pen"></i>
</a>

<button class="icon-btn ms-1">
    <i class="fa-solid fa-file-pdf"></i>
</button>
        </div>

    </div>

    <!-- SLOTS -->
    <div class="p-3 bg-light">
    <div class="row g-2 justify-content-center">

        <?php for($i=1; $i<=6; $i++): ?>

            <?php $pokemon = $redTeam['pokemon'.$i]; ?>

            <div class="col-4 col-md-2">

                <div class="slot">

                    <?php if(!empty($pokemon) && $pokemon != 0): ?>

                        <img
                            src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/<?= $pokemon ?>.png"
                            width="72">

                        <div class="fw-bold mt-2">
                            #<?= $pokemon ?>
                        </div>

                    <?php else: ?>

                        <i class="fa-solid fa-plus"></i>
                        <span class="small text-muted">
                            Slot <?= $i ?>
                        </span>

                    <?php endif; ?>

                </div>

            </div>

        <?php endfor; ?>

    </div>
</div>

</div>

    <!-- TIME AZUL -->
    <div class="team-card team-blue mb-4">

    <div class="team-header d-flex justify-content-between align-items-center">

        <div class="d-flex align-items-center gap-2">
                    <!-- macaco agua -->
            <img src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/versions/generation-v/black-white/animated/515.gif"
                 style="width:40px; height:40px;">

            <span>💧 Blue Team</span>

        </div>

        <div>
            <a href="<?= site_url('teams/edit/'.$blueTeam['id']) ?>" class="icon-btn text-decoration-none">
    <i class="fa-solid fa-pen"></i>
</a>

<button class="icon-btn ms-1">
    <i class="fa-solid fa-file-pdf"></i>
</button>
        </div>

    </div>

   <div class="p-3 bg-light">
    <div class="row g-2 justify-content-center">

        <?php for($i=1; $i<=6; $i++): ?>

            <?php $pokemon = $blueTeam['pokemon'.$i]; ?>

            <div class="col-4 col-md-2">

                <div class="slot">

                    <?php if(!empty($pokemon) && $pokemon != 0): ?>

                        <img
                            src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/<?= $pokemon ?>.png"
                            width="72">

                        <div class="fw-bold mt-2">
                            #<?= $pokemon ?>
                        </div>

                    <?php else: ?>

                        <i class="fa-solid fa-plus"></i>
                        <span class="small text-muted">
                            Slot <?= $i ?>
                        </span>

                    <?php endif; ?>

                </div>

            </div>

        <?php endfor; ?>

    </div>
</div>

    </div>



    <!-- TEAM GREEN -->
    <div class="team-card team-green mb-4">

    <div class="team-header d-flex justify-content-between align-items-center">

        <div class="d-flex align-items-center gap-2">
                    <!-- macaco planta -->
            <img src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/versions/generation-v/black-white/animated/511.gif"
                 style="width:40px; height:40px;">

            <span>🌿 Green Team</span>

        </div>

        <div>
            <a href="<?= site_url('teams/edit/'.$greenTeam['id']) ?>" class="icon-btn text-decoration-none">
    <i class="fa-solid fa-pen"></i>
</a>

<button class="icon-btn ms-1">
    <i class="fa-solid fa-file-pdf"></i>
</button>

        </div>

    </div>

    <div class="p-3 bg-light">
    <div class="row g-2 justify-content-center">

        <?php for($i=1; $i<=6; $i++): ?>

            <?php $pokemon = $greenTeam['pokemon'.$i]; ?>

            <div class="col-4 col-md-2">

                <div class="slot">

                    <?php if(!empty($pokemon) && $pokemon != 0): ?>

                        <img
                            src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/<?= $pokemon ?>.png"
                            width="72">

                        <div class="fw-bold mt-2">
                            #<?= $pokemon ?>
                        </div>

                    <?php else: ?>

                        <i class="fa-solid fa-plus"></i>
                        <span class="small text-muted">
                            Slot <?= $i ?>
                        </span>

                    <?php endif; ?>

                </div>

            </div>

        <?php endfor; ?>

    </div>
</div>

</div>

<!-- MODAL DA POKÉAPI -->
<div class="modal fade" id="searchPokemonModal" tabindex="-1" aria-labelledby="searchPokemonModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title" id="searchPokemonModalLabel"><i class="fa-solid fa-tablet-screen-button me-2"></i>Pokédex - Unova</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body bg-light">
        
        <div class="row g-3">
            <?php if (!empty($pokemons)): ?>
                <!-- Renderiza os 156 Pokémon vindos do Controller/Service -->
                <?php foreach ($pokemons as $poke): ?>
                    <div class="col-4 col-md-3 col-lg-2">
                        <div class="p-2 bg-white shadow-sm rounded text-center poke-select-card" style="cursor: pointer;">
                            <img src="<?= esc($poke['sprite']) ?>" alt="<?= esc($poke['name']) ?>" class="img-fluid" style="width: 80px; height: 80px;">
                            <div class="small fw-bold text-capitalize text-dark mt-1"><?= esc($poke['name']) ?></div>
                            <div class="badge bg-secondary">#<?= esc($poke['id']) ?></div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 text-center text-muted py-5">
                    <i class="fa-solid fa-triangle-exclamation fs-1 mb-3 text-warning"></i>
                    <h5>Nenhum Pokémon encontrado.</h5>
                    <p>Verifique a conexão do seu PokemonService com a PokéAPI.</p>
                </div>
            <?php endif; ?>
        </div>

      </div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>