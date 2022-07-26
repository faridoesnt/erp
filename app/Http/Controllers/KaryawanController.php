<?php

namespace App\Http\Controllers;

use Throwable;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Requests\ManagerKaryawanRequest;
use App\Http\Services\Karyawan\KaryawanService;
use App\Http\Services\ManagerKaryawan\ManagerKaryawanService;

class KaryawanController extends Controller
{
    protected $karyawanService;
    protected $managerKaryawanService;

    public function __construct(KaryawanService $karyawanService, ManagerKaryawanService $managerKaryawanService)
    {
        $this->karyawanService = $karyawanService;
        $this->managerKaryawanService = $managerKaryawanService;
    }

    public function index()
    {
        $karyawan = $this->karyawanService->getAll();
        $manager = $this->managerKaryawanService->getManager();

        return view('pages.dashboard.karyawan.index', [
            'karyawan' => $karyawan,
            'manager' => $manager,
        ]);
    }

    public function set_manager($id)
    {
        $data = $this->managerKaryawanService->create();

        return view('pages.dashboard.karyawan.setmanager', [
            'id' => $id,
            'data' => $data
        ]);
    }

    public function create()
    {
        return view('pages.dashboard.karyawan.create');
    }

    public function store(UserRequest $request)
    {
        try
        {
            $this->karyawanService->saveData($request);

            return redirect()->route('karyawan.index')->with('success', 'Successfully Add New Data');
        }
        catch (Throwable $e)
        {
            return $e->getMessage();
        }
    }

    public function store_manager(ManagerKaryawanRequest $request)
    {
        try
        {
            $this->managerKaryawanService->saveData($request);

            return redirect()->route('karyawan.index')->with('success', 'Successfully Add New Data');
        } 
        catch (\Throwable $th)
        {
            throw $th;
        }
    }

    public function edit($id)
    {
        $karyawan = $this->karyawanService->editData($id);

        return view('pages.dashboard.karyawan.edit', [
            'karyawan'    => $karyawan
        ]);
    }

    public function update(UserRequest $request, $id)
    {
        try
        {
            $this->karyawanService->updateData($request, $id);

            return redirect()->route('karyawan.index')->with('success', 'Successfully Update Data');
        }
        catch (Throwable $e)
        {
            return $e->getMessage();
        }
    }

    public function destroy($id)
    {
        try
        {
            $this->karyawanService->delete($id);

            return redirect()->route('karyawan.index')->with('success', 'Successfully Delete Data');
        }
        catch (Throwable $e)
        {
            return $e->getMessage();
        }
    }
}
