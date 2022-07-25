<?php

namespace App\Http\Services\ManagerKaryawan;

use App\Http\Repository\ManagerKaryawan\ManagerKaryawanRepository;

class ManagerKaryawanService
{
    protected $managerKaryawanRepository;

    public function __construct(ManagerKaryawanRepository $managerKaryawanRepository)
    {
        $this->managerKaryawanRepository = $managerKaryawanRepository;
    }

    public function getAll()
    {
        return $this->managerKaryawanRepository->getAll();
    }
    public function create()
    {
        return $this->managerKaryawanRepository->create();
    }

    public function saveData($request)
    {
        return $this->managerKaryawanRepository->save($request);
    }

    public function edit($id)
    {
        return $this->managerKaryawanRepository->edit($id);
    }

    public function update($request, $id)
    {
        return $this->managerKaryawanRepository->update($request, $id);
    }

    public function delete($id)
    {
        return $this->managerKaryawanRepository->delete($id);
    }
}