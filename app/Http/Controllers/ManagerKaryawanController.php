<?php

namespace App\Http\Controllers;

use App\Http\Requests\ManagerKaryawanRequest;
use Illuminate\Http\Request;
use App\Http\Services\ManagerKaryawan\ManagerKaryawanService;

class ManagerKaryawanController extends Controller
{
    protected $managerKaryawanService;

    public function __construct(ManagerKaryawanService $managerKaryawanService)
    {
        $this->managerKaryawanService = $managerKaryawanService;
    }

    public function index()
    {
        $manager_karyawan = $this->managerKaryawanService->getAll(); 

        return view('pages.dashboard.organization.manager_karyawan.index', [
            'manager_karyawan' => $manager_karyawan
        ]);
    }

    public function create()
    {
        $data = $this->managerKaryawanService->create();

        return view('pages.dashboard.organization.manager_karyawan.create', [
            'data' => $data
        ]);
    }

    public function store(ManagerKaryawanRequest $request)
    {
        try
        {
            $this->managerKaryawanService->saveData($request);

            return redirect()->route('organization-manager-karyawan.index')->with('success', 'Successfully Add New Data');
        } 
        catch (\Throwable $th)
        {
            throw $th;
        }
    }

    public function edit($id)
    {
        try 
        {
            $manager_karyawan = $this->managerKaryawanService->edit($id);
            $data = $this->managerKaryawanService->create();

            return view('pages.dashboard.organization.manager_karyawan.edit', [
                'manager_karyawan' => $manager_karyawan,
                'data' => $data
            ]);
        } 
        catch (\Throwable $th) 
        {
            throw $th;
        }
    }

    public function update(ManagerKaryawanRequest $request, $id)
    {
        try 
        {
            $this->managerKaryawanService->update($request, $id);

            return redirect()->route('organization-manager-karyawan.index')->with('success', 'Successfully Update Data');
        } 
        catch (\Throwable $th) 
        {
            throw $th;
        }
    }

    public function destroy($id)
    {
        try 
        {
            $this->managerKaryawanService->delete($id);

            return redirect()->route('organization-manager-karyawan.index')->with('success', 'Successfully Delete Data');
        } 
        catch (\Throwable $th) 
        {
            throw $th;
        }
    }
}
