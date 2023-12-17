<?php

namespace App\Controllers;

class LeagueTeam extends BaseController
{

    public function index($id)
    {
        $leagueDB =  new \App\Models\League();
        $detail = $leagueDB->find($id);
        
        $detail['date_start'] = date('d/m/Y', strtotime($detail['date_start']));
        $detail['date_end'] = $detail['date_end'] ? date('d/m/Y', strtotime($detail['date_end'])) : '-';
        
        // get teams in league
        $db = \Config\Database::connect();
        $builder = $db->table('team');
        $builder->select('league_team.id as id, league_team.league_id as league_id, league_team.team_id as team_id, code, name');
        $builder->join('league_team', 'league_team.team_id = team.id');
        $builder->where('league_team.league_id = '.$id);
        $teams = $builder->get()->getResultArray();

        return view('league_team/list', [ 'detail' => $detail, 'teams' => $teams ]);
    }

    public function add($league_id)
    {
        $leagueDB =  new \App\Models\League();
        $legue = $leagueDB->find($league_id);

        $teamDB =  new \App\Models\Team();
        $teams = $teamDB->findAll();

        $db = \Config\Database::connect();
        $builder = $db->table('team');
        $builder->select('league_team.id as id, league_team.league_id as league_id, league_team.team_id as team_id, code, name');
        $builder->join('league_team', 'league_team.team_id = team.id');
        $builder->where('league_team.league_id = '.$league_id);
        $teams_checked = $builder->get()->getResultArray();
        $ids = [];
        if($teams_checked){
            foreach($teams_checked as $item){
                $ids[] = $item['team_id'];
            }
        }

        return view('league_team/add', [ 'league' => $legue, 'teams' => $teams, 'ids' => $ids ]);
    }

    public function save($league_id)
    {
        $leagueDB =  new \App\Models\League();
        $legue = $leagueDB->find($league_id);

        $teams = $this->request->getVar('team');

        $db = \Config\Database::connect();
        $builder = $db->table('league_team');
        $builder->where('league_id', $league_id);
        $builder->delete();

        if( !empty($teams) ) {
            $data = [];
            foreach( $teams as $id ){
                $data[] = [
                    'league_id' => $league_id,
                    'team_id' => $id,
                ];
            }
            $db = \Config\Database::connect();
            $builder = $db->table('league_team');
            $builder->insertBatch($data);
        }

        return redirect()->to('league-team/'.$league_id);
    }

    public function delete($league_id, $id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('league_team');
        $builder->where('league_id', $league_id);
        $builder->where('id', $id);
        $builder->delete();
        return redirect()->to('league-team/'.$league_id);
    }
}