<?php

namespace App\Http\Services\Manager;

use App\Http\Repository\Manager\H_ManagerRepository;

class H_ManagerService
{
    protected $h_managerRepository;

    public function __construct(H_ManagerRepository $h_managerRepository)
    {
        $this->h_managerRepository = $h_managerRepository;
    }

    public function getAll()
    {
        return $this->h_managerRepository->getAll();
    }

    public function getSupervisor()
    {
        return $this->h_managerRepository->getSupervisor();
    }

    public function saveData($request)
    {
        $data = $request->validate([
            'manager_id'   => 'required',
            'supervisor_id'   => 'required',
        ]);

        return $this->h_managerRepository->save($data);
    }

    public function editData($id)
    {
        return $this->h_managerRepository->edit($id);
    }

    public function updateData($request, $id)
    {
        $data = $request->validate([
            'manager_id'   => 'required',
            'supervisor_id'   => 'required',
        ]);

        return $this->h_managerRepository->update($data, $id);
    }

    public function delete($id)
    {
        return $this->h_managerRepository->destroy($id);
    }
}