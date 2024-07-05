<?php

namespace App\Controllers;

use App\Models\Product_model;

class Home extends BaseController
{
    protected $db;

    public function __construct()
    {
        $this->db = new Product_model();
        helper(['form']);
    }

    public function index()
    {
        $data['title'] = "Lihat Data Product";
        $data['data_product'] = $this->db->getAll();
        echo view('template/header', $data);
        echo view('template/menu');
        echo view('product/index', $data);
        echo view('template/footer');
    }

    public function add()
    {

        session();

        $data = [
            "title" => "Tambah Data Product",
        ];

        echo view('template/header', $data);
        echo view('template/menu');
        echo view('product/add', $data);
        echo view('template/footer');
    }

    public function save()
    {

        if (!$this->validate([
            'nama' => 'required',
            'kategori' => 'required',
            'harga' => 'required|integer',
            'berat' => 'required|integer',
            'keterangan' => 'required',
            'foto' => 'uploaded[foto]|max_size[foto,50000]|mime_in[foto,image/png,image/jpeg,image/jpg]'
        ])) {
            return redirect()->to(base_url('/add'))->withInput();
        }
        //ambil gambar
        $fileFoto = $this->request->getFile('foto');

        //pindahkan file ke folder img
        $fileFoto->move('img');

        //ambil nama file
        $namaFoto = $fileFoto->getName();

        $this->db->save([
            "nama" => $this->request->getVar('nama'),
            "kategori" => $this->request->getVar('kategori'),
            "harga" => $this->request->getVar('harga'),
            "berat" => $this->request->getVar('berat'),
            "foto" => $namaFoto,
            "keterangan" => $this->request->getVar('keterangan')
        ]);

        session()->setFlashdata('message', 'Data Berhasil ditambahkan.');
        return redirect()->to(base_url('/'));
    }

    public function delete($id)
    {
        //cari gambar
        $product = $this->db->getById($id);

        //hapus gambar
        unlink('img/' . $product['foto']);

        //hapus data di database
        $this->db->delete($id);
        session()->setFlashdata('message', 'Data Berhasil dihapus.');
        dd(session());
        return redirect()->to(base_url('/'));
    }

    public function edit($id)
    {
        session();

        $data = [
            "title" => "Edit Product",
            "data_product" => $this->db->getById($id)
        ];

        echo view('template/header', $data);
        echo view('template/menu');
        echo view('product/edit', $data);
        echo view('template/footer');
    }

    public function update()
    {
        if (!$this->validate([
            'nama' => 'required',
            'kategori' => 'required',
            'harga' => 'required|integer',
            'berat' => 'required|integer',
            'keterangan' => 'required',
            'foto' => 'max_size[foto,50000]|mime_in[foto,image/png,image/jpeg,image/jpg]'
        ])) {
            return redirect()->to(base_url('/add'))->withInput();
        }

        $fileFoto = $this->request->getFile('foto');

        // cek gambar
        if ($fileFoto->getError() == 4) {
            $namaFoto = $this->request->getVar('fotoLama');
        } else {
            $namaFoto = $fileFoto->getName();

            //pindahkan gambar baru 
            $fileFoto->move('img');

            // hapus gambar lama
            unlink('img/' . $this->request->getVar('fotoLama'));
        }
        $this->db->save([
            "id" => $this->request->getVar('id'),
            "nama" => $this->request->getVar('nama'),
            "kategori" => $this->request->getVar('kategori'),
            "harga" => $this->request->getVar('harga'),
            "berat" => $this->request->getVar('berat'),
            "foto" => $namaFoto,
            "keterangan" => $this->request->getVar('keterangan')
        ]);

        session()->setFlashdata('message', 'Data Berhasil diubah.');
        return redirect()->to(base_url('/'));
    }
}
