<?php

namespace App\Controllers;

use App\Services\PokemonService;
use App\Models\TeamModel;
use Dompdf\Dompdf;



class TeamController extends BaseController
{
    protected TeamModel $teamModel;

    public function __construct()
    {
        $this->teamModel = new TeamModel();
    }

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

   

    public function salvar()
    {
        if (!session()->get('logado')) {
            return redirect()->to('/login');
        }

        $usuario = session()->get('usuario');

        $dados = [
            'user_id'  => $usuario['id'],
            'nome'     => $this->request->getPost('nome'),
            'pokemon1' => $this->request->getPost('pokemon1'),
            'pokemon2' => $this->request->getPost('pokemon2'),
            'pokemon3' => $this->request->getPost('pokemon3'),
            'pokemon4' => $this->request->getPost('pokemon4'),
            'pokemon5' => $this->request->getPost('pokemon5'),
            'pokemon6' => $this->request->getPost('pokemon6'),
        ];

        $this->teamModel->criarEquipe($dados);

        return redirect()->back()->with('success', 'Equipe criada.');
    }

    public function atualizar($id)
    {
        if (!session()->get('logado')) {
            return redirect()->to('/login');
        }

        $dados = [
            'nome'     => $this->request->getPost('nome'),
            'pokemon1' => $this->request->getPost('pokemon1'),
            'pokemon2' => $this->request->getPost('pokemon2'),
            'pokemon3' => $this->request->getPost('pokemon3'),
            'pokemon4' => $this->request->getPost('pokemon4'),
            'pokemon5' => $this->request->getPost('pokemon5'),
            'pokemon6' => $this->request->getPost('pokemon6'),
        ];

        $this->teamModel->atualizarEquipe($id, $dados);

        return redirect()->back()->with('success', 'Equipe atualizada.');
    }

    public function excluir($id)
    {
        if (!session()->get('logado')) {
            return redirect()->to('/login');
        }

        $this->teamModel->excluirEquipe($id);

        return redirect()->back()->with('success', 'Equipe removida.');
    }

    public function buscar($id)
    {
        if (!session()->get('logado')) {
            return redirect()->to('/login');
        }

        $time = $this->teamModel->getTeam($id);

        return $this->response->setJSON($time);
    }

    public function meuTime()
    {
        $usuario = session()->get('usuario');

        $times = $this->teamModel
                    ->getTeamsByUser($usuario['id']);

        return view('team/meu_time', [
            'times' => $times
        ]);

        

}
    public function exportarPDF($id)
    {
        if (!session()->get('logado')) {
            return redirect()->to('/login');
        }

        $team = $this->teamModel->getTeam($id);

        if (!$team) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $html = view('pdf/team_pdf', [
            'team' => $team
        ]);

        $dompdf = new Dompdf();

        $dompdf->loadHtml($html);

        $dompdf->setPaper('A4', 'portrait');

        $dompdf->render();

        $dompdf->stream(
            $team['nome'] . '.pdf',
            [
                'Attachment' => true
            ]
        );

        exit;
    }

    
}



