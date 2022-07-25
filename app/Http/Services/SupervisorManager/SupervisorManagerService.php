<?php

namespace App\Http\Services\SupervisorManager;

use App\Http\Repository\SupervisorManager\SupervisorManagerRepository;

class SupervisorManagerService
{
    protected $supervisorManagerRepository;

    public function __construct(SupervisorManagerRepository $supervisorManagerRepository)
    {
        $this->supervisorManagerRepository = $supervisorManagerRepository;
    }

    public function getAll()
    {
        return $this->supervisorManagerRepository->getAll();
    }

    public function create()
    {
        return $this->supervisorManagerRepository->create();
    }

    public function saveData($request)
    {
        return $this->supervisorManagerRepository->save($request);
    }

    public function edit($id)
    {
        return $this->supervisorManagerRepository->edit($id);
    }

    public function update($request, $id)
    {
        return $this->supervisorManagerRepository->update($request, $id);
    }

    public function delete($id)
    {
        return $this->supervisorManagerRepository->delete($id);
    }
}