<?php

namespace App\Http\Services\SupervisorManager;

use App\Http\Repository\Manager\ManagerRepository;
use App\Http\Repository\Supervisor\SupervisorRepository;
use App\Http\Repository\SupervisorManager\SupervisorManagerRepository;

class SupervisorManagerService
{
    protected $supervisorManagerRepository;
    protected $supervisorRepository;
    protected $managerRepository;

    public function __construct(SupervisorManagerRepository $supervisorManagerRepository, SupervisorRepository $supervisorRepository, ManagerRepository $managerRepository)
    {
        $this->supervisorManagerRepository = $supervisorManagerRepository;
        $this->supervisorRepository = $supervisorRepository;
        $this->managerRepository = $managerRepository;
    }

    public function getSupervisor()
    {
        $manager = $this->managerRepository->getCreateEdit();

        $arr = [];

        foreach($manager as $value) {

            $arr[] = $this->supervisorManagerRepository->getSupervisor($value->id);
        }

        return $arr;
    }

    public function getManager()
    {
        $supervisor = $this->supervisorRepository->getCreateEdit();

        $arr = [];

        foreach($supervisor as $value) {

            $arr[] = $this->supervisorManagerRepository->getManager($value->id);
        }

        return $arr;
    }

    public function create()
    {
        return $this->supervisorManagerRepository->create();
    }

    public function saveData($request)
    {
        return $this->supervisorManagerRepository->save($request);
    }

    public function delete($id)
    {
        return $this->supervisorManagerRepository->delete($id);
    }
}