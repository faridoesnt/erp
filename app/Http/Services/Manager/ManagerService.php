<?php

namespace App\Http\Services\Manager;

use App\Http\Repository\Manager\ManagerRepository;

class ManagerService
{
    protected $managerRepository;

    public function __construct(ManagerRepository $managerRepository)
    {
        $this->managerRepository = $managerRepository;
    }

    public function getAll()
    {
        return $this->managerRepository->getAll();
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