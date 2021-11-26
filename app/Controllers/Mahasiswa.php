<?php

namespace App\Controllers;

class Mahasiswa extends BaseController
{
    function __construct()
    {
        $this->model = new \App\Models\ModelMahasiswa();
    }
    public function simpan()
    {
        return "Saya dari fungsi simpan";
    }
    public function index()
    {
        return view('mahasiswa_view');
    }
}
