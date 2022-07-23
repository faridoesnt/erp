<?php

namespace App\Http\Services\Supervisor;

use App\Http\Repository\Supervisor\SupervisorRepository;

class SupervisorService
{
    protected $supervisorRepository;

    public function __construct(SupervisorRepository $supervisorRepository)
    {
        $this->supervisorRepository = $supervisorRepository;
    }

    public function getAll()
    {
        return $this->supervisorRepository->getAll();
    }

    public function saveData($request)
    {
        return $this->supervisorRepository->save($request);
    }

    public function editData($id)
    {
        return $this->supervisorRepository->edit($id);
    }

    public function updateData($request, $id)
    {
        return $this->supervisorRepository->update($request, $id);
    }

    public function delete($id)
    {
        return $this->supervisorRepository->delete($id);
    }
}