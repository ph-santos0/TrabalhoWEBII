<?php

namespace App\Models;

use CodeIgniter\Model;

class TeamModel extends Model
{
    protected $table = 'teams';

    protected $primaryKey = 'id';

    protected $allowedFields = [
        'user_id',
        'nome',
        'pokemon1',
        'pokemon2',
        'pokemon3',
        'pokemon4',
        'pokemon5',
        'pokemon6'
    ];

    protected $useTimestamps = true;

    /*
    |--------------------------------------------------------------------------
    | CONSULTAS
    |--------------------------------------------------------------------------
    */

    public function getTeamsComUsuarios()
    {
        return $this
            ->select('teams.*, users.nome as treinador')
            ->join('users', 'users.id = teams.user_id')
            ->findAll();
    }

    public function getTeamsByUser($userId)
    {
        return $this
            ->where('user_id', $userId)
            ->findAll();
    }

    public function getTeam($id)
    {
        return $this
            ->where('id', $id)
            ->first();
    }

    /*
    |--------------------------------------------------------------------------
    | CRUD
    |--------------------------------------------------------------------------
    */

    public function criarEquipe(array $dados)
    {
        return $this->insert($dados);
    }

    public function atualizarEquipe($id, array $dados)
    {
        return $this->update($id, $dados);
    }

    public function excluirEquipe($id)
    {
        return $this->delete($id);
    }
}