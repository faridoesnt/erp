<?php

namespace App\Http\Controllers;

use App\Http\Requests\SupervisorManagerRequest;
use Throwable;
use App\Http\Requests\UserRequest;
use App\Http\Services\Supervisor\SupervisorService;
use App\Http\Services\SupervisorManager\SupervisorManagerService;

class SupervisorController extends Controller
{
    protected $supervisorService;
    protected $supervisorManagerService;

    public function __construct(SupervisorService $supervisorService, SupervisorManagerService $supervisorManagerService)
    {
        $this->supervisorService = $supervisorService;
        $this->supervisorManagerService = $supervisorManagerService;
    }

    public function index()
    {
        $supervisor = $this->supervisorService->getAll();
        $manager = $this->supervisorManagerService->getManager();

        return view('pages.dashboard.supervisor.index', [
            'supervisor' => $supervisor,
            'manager' => $manager,
        ]);
    }

    public function set_manager($id)
    {
        $data = $this->supervisorManagerService->create();

        return view('pages.dashboard.supervisor.setmanager', [
            'id' => $id,
            'data' => $data
        ]);
    }

    public function create()
    {
        return view('pages.dashboard.supervisor.create');
    }

    public function store(UserRequest $request)
    {
        try
        {
            $this->supervisorService->saveData($request);

            return redirect()->route('supervisor.index')->with('success', 'Successfully Add New Data');
        }
        catch (Throwable $e)
        {
            return $e->getMessage();
        }
    }

    public function store_manager(SupervisorManagerRequest $request)
    {
        try
        {
            $this->supervisorManagerService->saveData($request);

            return redirect()->route('supervisor.index')->with('success', 'Successfully Add New Data');
        } 
        catch (\Throwable $th)
        {
            throw $th;
        }
    }

    public function edit($id)
    {
        $supervisor = $this->supervisorService->editData($id);

        return view('pages.dashboard.supervisor.edit', [
            'supervisor'    => $supervisor
        ]);
    }

    public function update(UserRequest $request, $id)
    {
        try
        {
            $this->supervisorService->updateData($request, $id);

            return redirect()->route('supervisor.index')->with('success', 'Successfully Update Data');
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
            $this->supervisorService->delete($id);

            return redirect()->route('supervisor.index')->with('success', 'Successfully Delete Data');
        }
        catch (Throwable $e)
        {
            return $e->getMessage();
        }
    }
}
