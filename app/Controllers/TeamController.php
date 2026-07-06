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
    if (!session()->get('logado')) {
        return redirect()->to('/login');
    }

    $pokemonService = new PokemonService();

    $pokemons = $pokemonService->getGen5Pokemon();

    $userId = session()->get('id_usuario');

    $times = $this->teamModel->getTeamsByUser($userId);

    return view('teams/index', [
        'titulo'   => 'Dashboard - Team Builder',
        'pokemons' => $pokemons,
        'times'    => $times
    ]);
}
    
    
    public function edit($id)
{
    if (!session()->get('logado')) {
        return redirect()->to('/login');
    }

    $pokemonService = new PokemonService();

    $team = $this->teamModel->getTeam($id);

    if (!$team) {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }

    return view('teams/edit', [
        'team'      => $team,
        'pokemons'  => $pokemonService->getGen5Pokemon()
    ]);
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
    return $this->index();
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



