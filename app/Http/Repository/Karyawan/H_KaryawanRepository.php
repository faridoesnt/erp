<?php

namespace App\Http\Repository\Karyawan;
use App\Models\Hierarchy;
use Illuminate\Support\Facades\Auth;

class H_KaryawanRepository implements H_KaryawanRepositoryInterface
{
    protected $hierarchy;

    public function __construct(Hierarchy $hierarchy)
    {
        $this->hierarchy = $hierarchy;
    }

    public function getAll()
    {
        return $this->hierarchy->with(['karyawan', 'manager'])->paginate(10);
    }

    public function getManager()
    {
        $manager = $this->hierarchy->with(['karyawan', 'manager'])->where('karyawan_id', Auth::user()->id)->first();

        return $manager;
    }

    public function save($data)
    {
        $hierarchy = new $this->hierarchy;

        $hierarchy->karyawan_id = $data['karyawan_id'];
        $hierarchy->manager_id = $data['manager_id'];

        $hierarchy->save();

        return $hierarchy;
    }
}