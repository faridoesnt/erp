<?php

namespace App\Http\Services\MyAccount;

use App\Http\Repository\HR\HrRepository;
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
    protected $managerKaryawanRepository;
    protected $supervisorManagerRepository;
    protected $hrRepository;

    public function __construct(
            KaryawanRepository $karyawanRepository,
            ManagerRepository $managerRepository,
            SupervisorRepository $supervisorRepository,
            ManagerKaryawanRepository $managerKaryawanRepository,
            SupervisorManagerRepository $supervisorManagerRepository,
            HrRepository $hrRepository
        )
    {
        $this->karyawanRepository = $karyawanRepository;
        $this->managerRepository = $managerRepository;
        $this->supervisorRepository = $supervisorRepository;
        $this->managerKaryawanRepository = $managerKaryawanRepository;
        $this->supervisorManagerRepository = $supervisorManagerRepository;
        $this->hrRepository = $hrRepository;
    }

    public function myAccount()
    {
        $karyawan = $this->karyawanRepository->getID();
        $manager = $this->managerRepository->getID();
        $supervisor = $this->supervisorRepository->getID();
        $hr = $this->hrRepository->getID();

        if($karyawan)
        {
            $manager = $this->managerKaryawanRepository->getManager($karyawan->id);

            $data['karyawan'] = $karyawan;
            $data['manager'] = $manager;

            return $data;
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
        elseif($hr)
        {
            $data['hr'] = $hr;

            return $data;
        }
    }
}