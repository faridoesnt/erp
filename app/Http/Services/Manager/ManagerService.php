<?php

namespace App\Http\Services\Manager;

use App\Http\Repository\Manager\ManagerRepository;
use App\Http\Repository\ManagerKaryawan\ManagerKaryawanRepository;

class ManagerService
{
    protected $managerRepository;
    protected $managerKaryawanRepository;

    public function __construct(ManagerRepository $managerRepository, ManagerKaryawanRepository $managerKaryawanRepository)
    {
        $this->managerRepository = $managerRepository;
        $this->managerKaryawanRepository = $managerKaryawanRepository;
    }

    public function getAll()
    {
        return $this->managerRepository->getAll();
    }

    public function getCreateEdit()
    {
        return $this->managerRepository->getCreateEdit();
    }

    public function saveData($request)
    {
        return $this->managerRepository->save($request);
    }

    public function editData($id)
    {
        return $this->managerRepository->edit($id);
    }

    public function updateData($request, $id)
    {
        return $this->managerRepository->update($request, $id);
    }

    public function delete($id)
    {
        return $this->managerRepository->delete($id);
    }
}