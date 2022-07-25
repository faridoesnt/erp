<?php

namespace App\Http\Services\MyAccount;

use App\Http\Repository\Manager\ManagerRepository;
use App\Http\Repository\Karyawan\KaryawanRepository;
use App\Http\Repository\Supervisor\SupervisorRepository;
use App\Http\Repository\ManagerKaryawan\ManagerKaryawanRepository;
use App\Http\Repository\SupervisorManager\SupervisorManagerRepository;

class MyAccountService
{
    protected $karyawanRepository;
    protected $managerRepository;
    protected $supervisorRepository;
    protected $h_KaryawanRepository;
    protected $h_managerRepository;
    protected $h_supervisorRepository;
    protected $managerKaryawanRepository;
    protected $supervisorManagerRepository;

    public function __construct(
            KaryawanRepository $karyawanRepository,
            ManagerRepository $managerRepository,
            SupervisorRepository $supervisorRepository,
            ManagerKaryawanRepository $managerKaryawanRepository,
            SupervisorManagerRepository $supervisorManagerRepository
        )
    {
        $this->karyawanRepository = $karyawanRepository;
        $this->managerRepository = $managerRepository;
        $this->supervisorRepository = $supervisorRepository;
        $this->managerKaryawanRepository = $managerKaryawanRepository;
        $this->supervisorManagerRepository = $supervisorManagerRepository;
    }

    public function myAccount()
    {
        $karyawan = $this->karyawanRepository->getID();
        $manager = $this->managerRepository->getID();
        $supervisor = $this->supervisorRepository->getID();

        if($karyawan)
        {
            return $this->managerKaryawanRepository->getManager($karyawan->id);
        }
        elseif($manager)
        {
            $karyawan = $this->managerKaryawanRepository->getKaryawan($manager->id);
            $supervisor = $this->supervisorManagerRepository->getSupervisor($manager->id);

            $data['manager'] = $manager;
            $data['karyawan'] = $karyawan;
            $data['supervisor'] = $supervisor;

            return $data;
        }
        elseif($supervisor)
        {
            $manager = $this->supervisorManagerRepository->getManager($supervisor->id);

            $data['manager'] = $manager;
            $data['supervisor'] = $supervisor;

            return $data;
        }
    }
}