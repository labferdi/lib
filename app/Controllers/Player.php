<?php

namespace App\Controllers;

class Player extends BaseController
{
    public function index()
    {
        $playerDB =  new \App\Models\Player();

        $find = $playerDB->findAll();
        return view('player/list', [
            'data' => $find
        ]);
    }

    public function add()
    {
        return view('player/add');
    }
    
    public function save()
    {
        $validation = \Config\Services::validation();
        $request    = \Config\Services::request();

        $validation->setRules(
            [
                'name' => 'required|string|max_length[200]',
                'date_birth' => 'required|valid_date[d/m/Y]',
                'nationality' => 'required',
            ],
            [
                'name' => [
                    'required' => 'Nama pemain harus diisi',
                    'max_length' => 'Nama pemain maksimal 200 huruf',
                ],
                'date_birth' => [
                    'required' => 'Tanggal lahir pemain harus diisi',
                    'valid_date' => 'Format tanggal lahir pemain tidak valid',
                ],
                'nationality' => [
                    'valid_date' => 'Kebangsaan pemain harus diisi',
                ]
            ]
        );

        if (! $validation->withRequest($request)->run() ) {
            return view('player/add', [ 
                'errors' => $validation->getErrors() 
            ] );
        }

        $validData = $validation->getValidated();
        $validData['date_birth'] = $validData['date_birth'] ? date('Y-m-d', strtotime( str_replace('/', '-', $validData['date_birth']) )) : '';
        
        $playerDB =  new \App\Models\Player();
        $playerDB->insert([
            'name' => $validData['name'],
            'date_birth' => $validData['date_birth'],
            'nationality' => $validData['nationality'],
        ]);
        return redirect()->to('player');
    }

    public function edit($id)
    {
        $playerDB =  new \App\Models\Player();

        $detail = $playerDB->find($id);
        $detail['date_birth'] = date('d/m/Y', strtotime($detail['date_birth']));
        
        return view('player/edit', [ 'detail' => $detail ]);
    }

    public function update($id)
    {
        $playerDB =  new \App\Models\Player();
        $detail = $playerDB->find($id);
        $detail['date_birth'] = date('d/m/Y', strtotime($detail['date_birth']));

        $validation = \Config\Services::validation();
        $request    = \Config\Services::request();

        $validation->setRules(
            [
                'name' => 'required|string|max_length[200]',
                'date_birth' => 'required|valid_date[d/m/Y]',
                'nationality' => 'required',
            ],
            [
                'name' => [
                    'required' => 'Nama pemain harus diisi',
                    'max_length' => 'Nama pemain maksimal 200 huruf',
                ],
                'date_birth' => [
                    'required' => 'Tanggal lahir pemain harus diisi',
                    'valid_date' => 'Format tanggal lahir pemain tidak valid',
                ],
                'nationality' => [
                    'valid_date' => 'Kebangsaan pemain harus diisi',
                ]
            ]
        );

        if (! $validation->withRequest($request)->run() ) {
            return view('player/edit', [
                'detail' => $detail,
                'errors' => $validation->getErrors(),
            ] );
        }

        $validData = $validation->getValidated();
        $validData['date_birth'] = $validData['date_birth'] ? date('Y-m-d', strtotime( str_replace('/', '-', $validData['date_birth']) )) : '';

        $playerDB->where('id', $id)->set($validData)->update();
        return redirect()->to('player/'.$id);
    }
}
