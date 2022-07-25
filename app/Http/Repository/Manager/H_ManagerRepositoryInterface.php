<?php

namespace App\Http\Repository\Manager;

interface H_ManagerRepositoryInterface
{
    public function getAll();
    public function getKaryawan();
    public function getSupervisor();
    public function save($data);
    public function edit($id);
    public function update($data, $id);
    public function destroy($id);
}