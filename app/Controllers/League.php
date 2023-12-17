<?php

namespace App\Controllers;

class League extends BaseController
{
    public function index()
    {
        $leagueDB =  new \App\Models\League();

        $find = $leagueDB->findAll();
        return view('league/list', [
            'data' => $find
        ]);
    }

    public function add()
    {
        return view('league/add');
    }
    
    public function save()
    {
        $validation = \Config\Services::validation();
        $request    = \Config\Services::request();

        $validation->setRules(
            [
                'name' => 'required|string|max_length[200]',
                'date_start' => 'required|valid_date[d/m/Y]',
                'date_end' => 'permit_empty|valid_date[d/m/Y]',
            ],
            [
                'name' => [
                    'required' => 'Nama Liga harus diisi',
                    'max_length' => 'Nama Liga maksimal 200 huruf',
                ],
                'date_start' => [
                    'required' => 'Tanggal mulai liga harus diisi',
                    'valid_date' => 'Format tanggal mulai liga tidak valid',
                ],
                'date_end' => [
                    'valid_date' => 'Format tanggal selesai liga tidak valid',
                ]
            ]
        );

        if (! $validation->withRequest($request)->run() ) {
            return view('league/add', [ 
                'errors' => $validation->getErrors() 
            ] );
        }

        $validData = $validation->getValidated();
        $validData['date_start'] = $validData['date_start'] ? date('Y-m-d', strtotime( str_replace('/', '-', $validData['date_start']) )) : '';
        $validData['date_end'] = $validData['date_end'] ? date('Y-m-d', strtotime( str_replace('/', '-', $validData['date_end']) )) : '';
        
        $leagueDB =  new \App\Models\League();
        $leagueDB->insert([
            'name' => $validData['name'],
            'date_start' => $validData['date_start'],
            'date_end' => $validData['date_end'],
        ]);
        return redirect()->to('league');
    }

    public function edit($id)
    {
        $leagueDB =  new \App\Models\League();

        $detail = $leagueDB->find($id);
        $detail['date_start'] = date('d/m/Y', strtotime($detail['date_start']));
        $detail['date_end'] = $detail['date_end'] ? date('d/m/Y', strtotime($detail['date_end'])) : '';
        
        return view('league/edit', [ 'detail' => $detail ]);
    }

    public function update($id)
    {
        $leagueDB =  new \App\Models\League();
        $detail = $leagueDB->find($id);
        $detail['date_start'] = date('d/m/Y', strtotime($detail['date_start']));
        $detail['date_end'] = $detail['date_end'] ? date('d/m/Y', strtotime($detail['date_end'])) : '';

        $validation = \Config\Services::validation();
        $request    = \Config\Services::request();

        $validation->setRules(
            [
                'name' => 'required|string|max_length[200]',
                'date_start' => 'required|valid_date[d/m/Y]',
                'date_end' => 'permit_empty|valid_date[d/m/Y]',
            ],
            [
                'name' => [
                    'required' => 'Nama Liga harus diisi',
                    'max_length' => 'Nama Liga maksimal 200 huruf',
                ],
                'date_start' => [
                    'required' => 'Tanggal mulai liga harus diisi',
                    'valid_date' => 'Format tanggal mulai liga tidak valid',
                ],
                'date_end' => [
                    'valid_date' => 'Format tanggal selesai liga tidak valid',
                ]
            ]
        );

        if (! $validation->withRequest($request)->run() ) {
            return view('league/edit', [
                'detail' => $detail,
                'errors' => $validation->getErrors(),
            ] );
        }

        $validData = $validation->getValidated();
        $validData['date_start'] = $validData['date_start'] ? date('Y-m-d', strtotime( str_replace('/', '-', $validData['date_start']) )) : '';
        $validData['date_end'] = $validData['date_end'] ? date('Y-m-d', strtotime( str_replace('/', '-', $validData['date_end']) )) : '';

        $leagueDB->where('id', $id)->set($validData)->update();
        return redirect()->to('league/'.$id);
    }
}
