<?php

namespace App\Http\Controllers;

use App\Http\Requests\SupervisorManagerRequest;
use Illuminate\Http\Request;
use App\Http\Services\SupervisorManager\SupervisorManagerService;

class SupervisorManagerController extends Controller
{
    protected $supervisorManagerService;

    public function __construct(SupervisorManagerService $supervisorManagerService)
    {
        $this->supervisorManagerService = $supervisorManagerService;
    }

    public function index()
    {
        $supervisor_manager = $this->supervisorManagerService->getAll(); 

        return view('pages.dashboard.organization.supervisor_manager.index', [
            'supervisor_manager' => $supervisor_manager
        ]);
    }

    public function create()
    {
        $data = $this->supervisorManagerService->create();

        return view('pages.dashboard.organization.supervisor_manager.create', [
            'data' => $data
        ]);
    }

    public function store(SupervisorManagerRequest $request)
    {
        try
        {
            $this->supervisorManagerService->saveData($request);

            return redirect()->route('organization-supervisor-manager.index')->with('success', 'Successfully Add New Data');
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
            $supervisor_manager = $this->supervisorManagerService->edit($id);
            $data = $this->supervisorManagerService->create();

            return view('pages.dashboard.organization.supervisor_manager.edit', [
                'supervisor_manager' => $supervisor_manager,
                'data' => $data
            ]);
        } 
        catch (\Throwable $th) 
        {
            throw $th;
        }
    }

    public function update(SupervisorManagerRequest $request, $id)
    {
        try 
        {
            $this->supervisorManagerService->update($request, $id);

            return redirect()->route('organization-supervisor-manager.index')->with('success', 'Successfully Update Data');
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
            $this->supervisorManagerService->delete($id);

            return redirect()->route('organization-supervisor-manager.index')->with('success', 'Successfully Delete Data');
        } 
        catch (\Throwable $th) 
        {
            throw $th;
        }
    }
}
