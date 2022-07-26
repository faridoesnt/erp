<?php

namespace App\Http\Controllers;

use Throwable;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Requests\ManagerKaryawanRequest;
use App\Http\Services\Manager\ManagerService;
use App\Http\Requests\SupervisorManagerRequest;
use App\Http\Services\ManagerKaryawan\ManagerKaryawanService;
use App\Http\Services\SupervisorManager\SupervisorManagerService;

class ManagerController extends Controller
{
    protected $managerService;
    protected $managerKaryawanService;
    protected $supervisorManagerService;

    public function __construct(ManagerService $managerService, ManagerKaryawanService $managerKaryawanService, SupervisorManagerService $supervisorManagerService)
    {
        $this->managerService = $managerService;
        $this->managerKaryawanService = $managerKaryawanService;
        $this->supervisorManagerService = $supervisorManagerService;
    }

    public function index()
    {
        $manager = $this->managerService->getAll();
        $karyawan = $this->managerKaryawanService->getKaryawan();
        $supervisor = $this->supervisorManagerService->getSupervisor();

        return view('pages.dashboard.manager.index', [
            'manager' => $manager,
            'karyawan' => $karyawan,
            'supervisor' => $supervisor,
        ]);
    }

    public function set_karyawan($id)
    {
        $data = $this->managerKaryawanService->create();

        return view('pages.dashboard.manager.setkaryawan', [
            'id' => $id,
            'data' => $data
        ]);
    }

    public function set_supervisor($id)
    {
        $data = $this->supervisorManagerService->create();

        return view('pages.dashboard.manager.setsupervisor', [
            'id' => $id,
            'data' => $data
        ]);
    }

    public function create()
    {
        return view('pages.dashboard.manager.create');
    }

    public function store(UserRequest $request)
    {
        try
        {
            $this->managerService->saveData($request);

            return redirect()->route('manager.index')->with('success', 'Successfully Add New Data');
        }
        catch (Throwable $e)
        {
            return $e->getMessage();
        }
    }

    public function store_karyawan(ManagerKaryawanRequest $request)
    {
        try
        {
            $this->managerKaryawanService->saveData($request);

            return redirect()->route('manager.index')->with('success', 'Successfully Add New Data');
        } 
        catch (\Throwable $th)
        {
            throw $th;
        }
    }

    public function store_supervisor(SupervisorManagerRequest $request)
    {
        try
        {
            $this->supervisorManagerService->saveData($request);

            return redirect()->route('manager.index')->with('success', 'Successfully Add New Data');
        } 
        catch (\Throwable $th)
        {
            throw $th;
        }
    }

    public function edit($id)
    {
        $manager = $this->managerService->editData($id);

        return view('pages.dashboard.manager.edit', [
            'manager'    => $manager
        ]);
    }

    public function update(UserRequest $request, $id)
    {
        try
        {
            $this->managerService->updateData($request, $id);

            return redirect()->route('manager.index')->with('success', 'Successfully Update Data');
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
            $this->managerService->delete($id);

            return redirect()->route('manager.index')->with('success', 'Successfully Delete Data');
        }
        catch (Throwable $e)
        {
            return $e->getMessage();
        }
    }
}
