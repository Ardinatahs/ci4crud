<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelMahasiswa extends Model 
{
    protected $table = "mahasiswa";
    protected $primaryKey = "id";
    protected $allowedFields = ['nama','email','jurusan','alamat'];
}