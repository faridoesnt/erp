<?php

namespace App\Http\Services\MyAccount;

use App\Http\Repository\Karyawan\H_KaryawanRepository;
use App\Http\Repository\Karyawan\KaryawanRepository;
use App\Http\Repository\Manager\ManagerRepository;
use App\Http\Repository\Supervisor\SupervisorRepository;

class MyAccountService
{
    protected $karyawanRepository;
    protected $managerRepository;
    protected $supervisorRepository;
    protected $h_KaryawanRepository;

    public function __construct(
            KaryawanRepository $karyawanRepository,
            ManagerRepository $managerRepository,
            SupervisorRepository $supervisorRepository,
            H_KaryawanRepository $h_KaryawanRepository
        )
    {
        $this->karyawanRepository = $karyawanRepository;
        $this->managerRepository = $managerRepository;
        $this->supervisorRepository = $supervisorRepository;
        $this->h_KaryawanRepository = $h_KaryawanRepository;
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
            dd('manager');
        }
        elseif($supervisor)
        {
            dd('supervisor');
        }
    }
}