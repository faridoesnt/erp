<?php

namespace App\Http\Services\Karyawan;

use App\Http\Repository\Karyawan\KaryawanRepository;

class KaryawanService
{
    protected $karyawanRepository;

    public function __construct(KaryawanRepository $karyawanRepository)
    {
        $this->karyawanRepository = $karyawanRepository;
    }

    public function getAll()
    {
        return $this->karyawanRepository->getAll();
    }

    public function saveData($request)
    {
        return $this->karyawanRepository->save($request);
    }

    public function editData($id)
    {
        return $this->karyawanRepository->edit($id);
    }

    public function updateData($request, $id)
    {
        return $this->karyawanRepository->update($request, $id);
    }

    public function delete($id)
    {
        return $this->karyawanRepository->delete($id);
    }
}