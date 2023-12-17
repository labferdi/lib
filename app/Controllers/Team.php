<?php

namespace App\Controllers;

class Team extends BaseController
{
    public function index()
    {
        $teamDB =  new \App\Models\Team();

        $find = $teamDB->findAll();
        return view('team/list', [
            'data' => $find
        ]);
    }

    public function add()
    {
        return view('team/add');
    }
    
    public function save()
    {
        $validation = \Config\Services::validation();
        $request    = \Config\Services::request();

        $validation->setRules(
            [
                'code' => 'required|string|max_length[20]',
                'name' => 'required|string|max_length[200]',
            ],
            [
                'code' => [
                    'required' => 'Kode Tim harus diisi',
                    'max_length' => 'Kode Tim maksimal 20 huruf',
                ],
                'name' => [
                    'required' => 'Nama Tim harus diisi',
                    'max_length' => 'Nama Tim maksimal 200 huruf',
                ],
            ]
        );

        if (! $validation->withRequest($request)->run() ) {
            return view('team/add', [ 
                'errors' => $validation->getErrors() 
            ] );
        }

        $validData = $validation->getValidated();

        $teamDB =  new \App\Models\Team();
        $teamDB->insert([
            'code' => $validData['code'],
            'name' => $validData['name'],
        ]);
        return redirect()->to('team');
    }

    public function edit($id)
    {
        $teamDB =  new \App\Models\Team();

        $detail = $teamDB->find($id);
        return view('team/edit', [ 'detail' => $detail ]);
    }

    public function update($id)
    {
        $teamDB =  new \App\Models\Team();
        $detail = $teamDB->find($id);

        $validation = \Config\Services::validation();
        $request    = \Config\Services::request();

        $validation->setRules(
            [
                'code' => 'required|string|max_length[20]',
                'name' => 'required|string|max_length[200]',
            ],
            [
                'code' => [
                    'required' => 'Kode Tim harus diisi',
                    'max_length' => 'Kode Tim maksimal 20 huruf',
                ],
                'name' => [
                    'required' => 'Nama Tim harus diisi',
                    'max_length' => 'Nama Tim maksimal 200 huruf',
                ],
            ]
        );

        if (! $validation->withRequest($request)->run() ) {
            return view('team/edit', [
                'detail' => $detail,
                'errors' => $validation->getErrors(),
            ] );
        }

        $validData = $validation->getValidated();

        $teamDB->where('id', $id)->set($validData)->update();
        return redirect()->to('team/'.$id);
    }
}
