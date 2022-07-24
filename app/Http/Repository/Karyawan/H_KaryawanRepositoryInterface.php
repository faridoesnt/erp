<?php

namespace App\Http\Repository\Karyawan;

interface H_KaryawanRepositoryInterface
{
    public function getAll();
    public function getManager();
    public function save($data);
    public function edit($id);
    public function update($data, $id);
    public function destroy($id);
}