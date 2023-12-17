<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Player extends Migration
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
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 200,
            ],
            'date_birth' => [
                'type' => 'DATE',
            ],
            'nationality' => [
                'type' => 'VARCHAR',
                'constraint' => 200,
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('player');
    }

    public function down()
    {
        $this->forge->dropTable('player');
    }
}
