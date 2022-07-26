<?php

namespace App\Http\Repository\ManagerKaryawan;

use App\Models\ManagerKaryawan;
use App\Models\User;

class ManagerKaryawanRepository implements ManagerKaryawanRepositoryInterface
{
    protected $manager_karyawan;
    protected $user;

    public function __construct(ManagerKaryawan $manager_karyawan, User $user)
    {
        $this->manager_karyawan = $manager_karyawan;
        $this->user = $user;
    }

    public function getManager($id)
    {
        return $this->manager_karyawan->with(['manager'])->where('karyawan_id', $id)->get();
    }

    public function getKaryawan($id)
    {
        return $this->manager_karyawan->with(['karyawan'])->where('manager_id', $id)->get();
    }

    public function create()
    {
        $manager = $this->user->where('roles', 'Manager')->get();
        $karyawan = $this->user->where('roles', 'Karyawan')->get();

        $data['manager'] = $manager;
        $data['karyawan'] = $karyawan;

        return $data;
    }

    public function save($request)
    {
        $manager_karyawan = new $this->manager_karyawan;

        $manager_karyawan->manager_id = $request->manager_id;
        $manager_karyawan->karyawan_id = $request->karyawan_id;

        $manager_karyawan->save();

        return $manager_karyawan;
    }

    public function delete($id)
    {
        $manager_karyawan = $this->manager_karyawan->findOrfail($id);

        $manager_karyawan->delete();

        return $manager_karyawan;
    }
}