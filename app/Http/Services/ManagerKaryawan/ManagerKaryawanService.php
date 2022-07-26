<?php

namespace App\Http\Services\ManagerKaryawan;

use App\Http\Repository\Karyawan\KaryawanRepository;
use App\Http\Repository\Manager\ManagerRepository;
use App\Http\Repository\ManagerKaryawan\ManagerKaryawanRepository;

class ManagerKaryawanService
{
    protected $managerKaryawanRepository;
    protected $managerRepository;
    protected $karyawanRepository;

    public function __construct(ManagerKaryawanRepository $managerKaryawanRepository, ManagerRepository $managerRepository, KaryawanRepository $karyawanRepository)
    {
        $this->managerKaryawanRepository = $managerKaryawanRepository;
        $this->managerRepository = $managerRepository;
        $this->karyawanRepository = $karyawanRepository;
    }

    public function getKaryawan()
    {
        $manager = $this->managerRepository->getCreateEdit();

        $arr = [];

        foreach($manager as $value) {

            $arr[] = $this->managerKaryawanRepository->getKaryawan($value->id);
        }

        return $arr;
    }

    public function getManager()
    {
        $karyawan = $this->karyawanRepository->getCreateEdit();

        $arr = [];

        foreach($karyawan as $value) {

            $arr[] = $this->managerKaryawanRepository->getManager($value->id);
        }

        return $arr;
    }

    public function create()
    {
        return $this->managerKaryawanRepository->create();
    }

    public function saveData($request)
    {
        return $this->managerKaryawanRepository->save($request);
    }

    public function delete($id)
    {
        return $this->managerKaryawanRepository->delete($id);
    }
}