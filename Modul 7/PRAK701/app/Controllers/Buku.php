<?php

namespace App\Controllers;

use App\Models\BukuModel;

class Buku extends BaseController
{
    protected $bukuModel;

    public function __construct()
    {
        $this->bukuModel = new BukuModel();
    }

    public function index()
    {
        $data = [
            'buku' => $this->bukuModel->findAll()
        ];
        return view('buku/index', $data);
    }

    public function create()
    {
        session();
        $data = [
            'validation' => \Config\Services::validation()
        ];
        return view('buku/create', $data);
    }

    public function store()
    {
        if (!$this->validate([
            'judul' => [
                'rules' => 'required|string',
                'errors' => [
                    'required' => 'Judul buku wajib diisi.',
                    'string' => 'Judul harus berupa teks.'
                ]
            ],
            'penulis' => [
                'rules' => 'required|string',
                'errors' => [
                    'required' => 'Nama penulis wajib diisi.',
                    'string' => 'Nama penulis harus berupa teks.'
                ]
            ],
            'penerbit' => [
                'rules' => 'required|string',
                'errors' => [
                    'required' => 'Nama penerbit wajib diisi.',
                    'string' => 'Nama penerbit harus berupa teks.'
                ]
            ],
            'tahun_terbit' => [
                'rules' => 'required|numeric|greater_than[1800]|less_than[2024]',
                'errors' => [
                    'required' => 'Tahun terbit wajib diisi.',
                    'numeric' => 'Tahun terbit harus berupa angka.',
                    'greater_than' => 'Tahun terbit harus lebih besar dari 1800.',
                    'less_than' => 'Tahun terbit harus lebih kecil dari 2024.'
                ]
            ]
        ])) {
            return redirect()->to('/buku/create')->withInput();
        }

        $this->bukuModel->save([
            'judul' => $this->request->getVar('judul'),
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
            'tahun_terbit' => $this->request->getVar('tahun_terbit')
        ]);

        return redirect()->to('/buku');
    }

    public function edit($id)
    {
        $data = [
            'buku' => $this->bukuModel->find($id)
        ];
        return view('buku/edit', $data);
    }

    public function update($id)
    {
        $this->bukuModel->save([
            'id' => $id,
            'judul' => $this->request->getVar('judul'),
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
            'tahun_terbit' => $this->request->getVar('tahun_terbit')
        ]);

        return redirect()->to('/buku');
    }

    public function delete($id)
    {
        $this->bukuModel->delete($id);
        return redirect()->to('/buku');
    }
}