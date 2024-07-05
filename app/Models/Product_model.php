<?php

namespace App\Models;

use CodeIgniter\Model;

class Product_model extends Model
{
    protected $table = 'product';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama', 'kategori', 'harga', 'berat', 'foto', 'keterangan'];


    public function rules()
    {
        return [
            'nama' => [
                'label' => 'nama',
                'rules' => 'trim|required'
            ],
            'kategori' => [
                'label' => 'kategori',
                'rules' => 'trim|required'
            ],
            'harga' => [
                'label' => 'harga',
                'rules' => 'trim|required'
            ],
            'berat' => [
                'label' => 'berat',
                'rules' => 'trim|required'
            ],
            'foto' => [
                'label' => 'foto',
                'rules' => 'trim|required'
            ],
            'keterangan' => [
                'label' => 'keterangan',
                'rules' => 'trim|required'
            ]
        ];
    }

    public function getAll()
    {
        return $this->orderBy('id', 'ASC')->findAll();
    }

    public function getById($id)
    {
        return $this->where(['id' => $id])->first();
    }
}
