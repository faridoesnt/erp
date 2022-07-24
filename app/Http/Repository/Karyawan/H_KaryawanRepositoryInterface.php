<?php

namespace App\Http\Repository\Karyawan;

interface H_KaryawanRepositoryInterface
{
    public function getAll();
    public function getManager();
    public function save($data);
}