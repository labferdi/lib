<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TeamPlayer extends Migration
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
            'team_id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
            ],
            'player_id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
            ],
            'position' => [
                'type'       => 'ENUM',
                'constraint' => ['defender', 'midfielder', 'forward', 'goalkeeper'],
            ],
            'number' => [
                'type'           => 'INT',
                'constraint'     => 2,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('team_id', 'team', 'id');
        $this->forge->addForeignKey('player_id', 'player', 'id');
        $this->forge->createTable('team_player');
    }
    
    public function down()
    {
        $this->db->disableForeignKeyChecks();
        $this->forge->dropTable('team_player');
        $this->db->enableForeignKeyChecks();
    }
}
