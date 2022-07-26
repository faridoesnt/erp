<?php

namespace App\Http\Repository\ManagerKaryawan;

interface ManagerKaryawanRepositoryInterface
{
    public function getManager($id);
    public function getKaryawan($id);
    public function create();
    public function save($request);
    public function delete($id);
}