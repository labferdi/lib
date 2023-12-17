<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DBSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'name'          => 'Kompetisi Liga 1 2024',
            'date_start'    => '2024-01-01',
        ];
        $this->db->table('league')->insert($data);
        
        $data = [
            [
                'code'  => 'PRSJ',
                'name'  => 'PERSIJA JAKARTA',
            ],
            [
                'code'  => 'PRSB',
                'name'  => 'PERSIB BANDUNG',
            ],
            [
                'code'  => 'PST',
                'name'  => 'PERSITA TANGERANG',
            ],
            [
                'code'  => 'DWUTD',
                'name'  => 'DEWA UNITED',
            ]
        ];
        $this->db->table('team')->insertBatch($data);

        $data = [
            [
                'name'          => 'Ismed Sofyan',
                'date_birth'    => '1979-08-28',
                'nationality'   => 'Indonesia',
            ],
            [
                'name'          => 'Bambang Pamungkas',
                'date_birth'    => '1980-06-10',
                'nationality'   => 'Indonesia',
            ],
            [
                'name'          => 'Teja Paku Alam', # 14 GK
                'date_birth'    => '1994-03-13',
                'nationality'   => 'Indonesia',
            ],
            [
                'name'          => 'David Aparecido da Silva', # 19 FW
                'date_birth'    => '1989-12-11',
                'nationality'   => 'Brazil',
            ],
            [
                'name'          => ' Irsyad Maulana', # 8 MF
                'date_birth'    => '1993-09-27',
                'nationality'   => 'Indonesia',
            ],
            [
                'name'          => 'Aditya Harlan', # 26  GK
                'date_birth'    => '1987-06-17',
                'nationality'   => 'Indonesia',
            ],
            [
                'name'          => 'Egy Maulana Vikri', # FW, 10
                'date_birth'    => '2000-07-07',
                'nationality'   => 'Indonesia',
            ],
            [
                'name'          => 'Asep Berlian', # 4 MF
                'date_birth'    => '1990-07-11',
                'nationality'   => 'Indonesia',
            ]
        ];
        $this->db->table('player')->insertBatch($data);

        $data = [
            [
                'league_id' => 1,
                'team_id' => 1,
            ],
            [
                'league_id' => 1,
                'team_id' => 2,
            ],
            [
                'league_id' => 1,
                'team_id' => 3,
            ],
            [
                'league_id' => 1,
                'team_id' => 4,
            ]
        ];
        $this->db->table('league_team')->insertBatch($data);


        $data = [
            [
                'team_id' => 1,
                'player_id' => 1,
                'number' => 14,
                'position' => 'defender',
            ],
            [
                'team_id' => 1,
                'player_id' => 2,
                'number' => 20,
                'position' => 'forward',
            ],
            [
                'team_id' => 2,
                'player_id' => 3,
                'number' => 14,
                'position' => 'goalkeeper',
            ],
            [
                'team_id' => 2,
                'player_id' => 4,
                'number' => 19,
                'position' => 'forward',
            ],
            [
                'team_id' => 3,
                'player_id' => 5,
                'number' => 8,
                'position' => 'midfielder',
            ],
            [
                'team_id' => 3,
                'player_id' => 6,
                'number' => 26,
                'position' => 'goalkeeper',
            ],
            [
                'team_id' => 4,
                'player_id' => 7,
                'number' => 10,
                'position' => 'forward',
            ],
            [
                'team_id' => 4,
                'player_id' => 8,
                'number' => 4,
                'position' => 'midfielder',
            ],
        ];
        $this->db->table('team_player')->insertBatch($data);

    }
}
