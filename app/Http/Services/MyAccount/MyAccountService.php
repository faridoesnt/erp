<?php

namespace App\Http\Services\MyAccount;

use App\Http\Repository\Manager\ManagerRepository;
use App\Http\Repository\Karyawan\KaryawanRepository;
use App\Http\Repository\Manager\H_ManagerRepository;
use App\Http\Repository\Karyawan\H_KaryawanRepository;
use App\Http\Repository\Supervisor\SupervisorRepository;
use App\Http\Repository\Supervisor\H_SupervisorRepository;

class MyAccountService
{
    protected $karyawanRepository;
    protected $managerRepository;
    protected $supervisorRepository;
    protected $h_KaryawanRepository;
    protected $h_managerRepository;
    protected $h_supervisorRepository;

    public function __construct(
            KaryawanRepository $karyawanRepository,
            ManagerRepository $managerRepository,
            SupervisorRepository $supervisorRepository,
            H_KaryawanRepository $h_KaryawanRepository,
            H_ManagerRepository $h_managerRepository,
            H_SupervisorRepository $h_supervisorRepository
        )
    {
        $this->karyawanRepository = $karyawanRepository;
        $this->managerRepository = $managerRepository;
        $this->supervisorRepository = $supervisorRepository;
        $this->h_KaryawanRepository = $h_KaryawanRepository;
        $this->h_managerRepository = $h_managerRepository;
        $this->h_supervisorRepository = $h_supervisorRepository;
    }

    public function myAccount()
    {
        $karyawan = $this->karyawanRepository->getID();
        $manager = $this->managerRepository->getID();
        $supervisor = $this->supervisorRepository->getID();

        if($karyawan)
        {
            return $this->h_KaryawanRepository->getManager();
        }
        elseif($manager)
        {
            $manager = $this->managerRepository->getID();
            $karyawan = $this->h_managerRepository->getKaryawan();
            $supervisor = $this->h_managerRepository->getSupervisor();

            $data['manager'] = $manager;
            $data['karyawan'] = $karyawan;
            $data['supervisor'] = $supervisor;

            return $data;
        }
        elseif($supervisor)
        {
            $supervisor = $this->supervisorRepository->getID();
            $manager = $this->h_supervisorRepository->getManager();

            $data['manager'] = $manager;
            $data['supervisor'] = $supervisor;

            return $data;
        }
    }
}