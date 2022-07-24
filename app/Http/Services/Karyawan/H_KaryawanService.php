<?php

namespace App\Http\Services\Karyawan;

use App\Http\Repository\Karyawan\H_KaryawanRepository;

class H_KaryawanService
{
    protected $h_karyawanRepository;

    public function __construct(H_KaryawanRepository $h_karyawanRepository)
    {
        $this->h_karyawanRepository = $h_karyawanRepository;
    }

    public function getAll()
    {
        return $this->h_karyawanRepository->getAll();
    }

    public function getManager()
    {
        return $this->h_karyawanRepository->getManager();
    }

    public function saveData($request)
    {
        $data = $request->validate([
            'karyawan_id'   => 'required',
            'manager_id'   => 'required',
        ]);

        return $this->h_karyawanRepository->save($data);
    }

    public function editData($id)
    {
        return $this->h_karyawanRepository->edit($id);
    }

    public function updateData($request, $id)
    {
        $data = $request->validate([
            'karyawan_id'   => 'required',
            'manager_id'   => 'required',
        ]);

        return $this->h_karyawanRepository->update($data, $id);
    }

    public function delete($id)
    {
        return $this->h_karyawanRepository->destroy($id);
    }
}