<?php

namespace App\Services;

class PokemonService
{
    private $client;

    public function __construct()
    {
        // Inicializa o cliente HTTP nativo do CodeIgniter
        $this->client = \Config\Services::curlrequest([
            'baseURI' => 'https://pokeapi.co/api/v2/',
            'verify' => false,
            'http_errors' => false
        ]);
    }

    /**
     * Busca os Pokémon da 5ª Geração (Unova)
     */
    public function getGen5Pokemon(): array
    {
        // Usamos cache para não sobrecarregar a PokéAPI e deixar seu site voando
        $cache = \Config\Services::cache();
        $cacheKey = 'unova_pokemon_list';

        // Se já tiver no cache, retorna direto
        if ($cachedData = $cache->get($cacheKey)) {
            return $cachedData;
        }

        try {
            // A 5ª Geração começa no #494. Portanto, pulamos 493 (offset) e pegamos 156 (limit)
            $response = $this->client->get('pokemon?limit=156&offset=493');

            
            
            if ($response->getStatusCode() === 200) {
                $data = json_decode($response->getBody(), true);
                
                $pokemonList = [];
                foreach ($data['results'] as $poke) {
                    // A API retorna a URL do Pokémon. Vamos extrair o ID numérico dela.
                    $urlParts = explode('/', rtrim($poke['url'], '/'));
                    $id = end($urlParts);
                    
                    // Já montamos o array com o ID, Nome com primeira letra maiúscula e a imagem
                    $pokemonList[] = [
                        'id'     => $id,
                        'name'   => ucfirst($poke['name']),
                        'sprite' => "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/{$id}.png"
                    ];
                }

                // Salva no cache por 24 horas (86400 segundos)
                $cache->save($cacheKey, $pokemonList, 86400);

                return $pokemonList;
            }
        } catch (\Throwable $e) {
    dd(
        $e->getMessage(),
        $e->getFile(),
        $e->getLine()
    );
}

        return [];
    }
}