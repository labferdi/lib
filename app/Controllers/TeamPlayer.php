<?php

namespace App\Controllers;

class TeamPlayer extends BaseController
{

    public function index($id)
    {
        $teamDB =  new \App\Models\Team();
        $detail = $teamDB->find($id);
        
        // get player in team
        $db = \Config\Database::connect();
        $builder = $db->table('player');
        $builder->select('team_player.id as id, team_player.team_id as team_id, team_player.player_id as player_id, number, position, name, nationality');
        $builder->join('team_player', 'team_player.player_id = player.id');
        $builder->where('team_player.team_id = '.$id);
        $players = $builder->get()->getResultArray();

        $is_max = count($players) >= 35 ? true: false;

        return view('team_player/list', [ 'detail' => $detail, 'players' => $players, 'is_max' => $is_max ]);
    }

    public function add($team_id)
    {
        $teamDB =  new \App\Models\Team();
        $detail = $teamDB->find($team_id);

        $playerDB =  new \App\Models\Player();
        $players = $playerDB->findAll();

        return view('team_player/add', [ 'detail' => $detail, 'players' => $players ]);
    }

    public function save($team_id)
    {
        $teamDB =  new \App\Models\Team();
        $detail = $teamDB->find($team_id);

        $player_id = $this->request->getVar('player_id');
        $position = $this->request->getVar('position');
        $number = $this->request->getVar('number');

        $db = \Config\Database::connect();
        $builder = $db->table('team_player');
        $builder->insert([
            'team_id' => $team_id,
            'player_id' => $player_id,
            'position' => $position,
            'number' => $number,
        ]);
        return redirect()->to('team-player/'.$team_id);
    }

    public function delete($team_id, $id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('team_player');
        $builder->where('team_id', $team_id);
        $builder->where('id', $id);
        $builder->delete();
        return redirect()->to('team-player/'.$team_id);
    }
}
