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

    public function getTeamsComUsuarios(){

        return $this

            ->select('teams.*, users.nome as treinador')

            ->join('users','users.id = teams.user_id')

            ->findAll();

    }

}