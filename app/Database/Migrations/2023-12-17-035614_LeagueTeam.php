<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class LeagueTeam extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'league_id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
            ],
            'team_id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('league_id', 'league', 'id');
        $this->forge->addForeignKey('team_id', 'team', 'id');
        $this->forge->createTable('league_team');
    }

    public function down()
    {
        $this->db->disableForeignKeyChecks();
        $this->forge->dropTable('league_team');
        $this->db->enableForeignKeyChecks();
    }
}
