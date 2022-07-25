<?php

namespace App\Http\Repository\ManagerKaryawan;

interface ManagerKaryawanRepositoryInterface
{
    public function getAll();
    public function getManager($id);
    public function getKaryawan($id);
    public function create();
    public function save($request);
    public function edit($id);
    public function update($request, $id);
    public function delete($id);
}