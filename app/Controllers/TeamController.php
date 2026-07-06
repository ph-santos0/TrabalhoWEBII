<?php

namespace App\Controllers;

use App\Services\PokemonService;

class TeamController extends BaseController
{
    public function index()
    {
        // Instancia o serviço de busca na PokéAPI
        $pokemonService = new PokemonService();

        // Busca a lista de Pokémon (da API ou Cache)
        $pokemons = $pokemonService->getGen5Pokemon();

        // Prepara os dados
        $data = [
            'titulo'   => 'Dashboard - Team Builder',
            'pokemons' => $pokemons
        ];

        // Carrega a view da dashboard
        return view('teams/index', $data);
    }
}