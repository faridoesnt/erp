<?php

namespace App\Http\Controllers;

use Throwable;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Services\Manager\H_ManagerService;
use App\Http\Services\Manager\ManagerService;
use App\Http\Services\Supervisor\SupervisorService;

class ManagerController extends Controller
{
    protected $managerService;
    protected $h_managerService;
    protected $supervisorService;

    public function __construct(ManagerService $managerService, H_ManagerService $h_managerService, SupervisorService $supervisorService)
    {
        $this->managerService = $managerService;
        $this->h_managerService = $h_managerService;
        $this->supervisorService = $supervisorService;
    }

    public function index()
    {
        $h_manager = $this->h_managerService->getAll();
        $manager = $this->managerService->getAll();

        return view('pages.dashboard.manager.index', [
            'manager' => $manager,
            'h_manager' => $h_manager,
        ]);
    }

    public function create()
    {
        return view('pages.dashboard.manager.create');
    }

    public function h_create()
    {
        $supervisor = $this->supervisorService->getCreateEdit();
        $manager = $this->managerService->getCreateEdit();

        return view('pages.dashboard.manager.hierarchy.create', [
            'supervisor' => $supervisor,
            'manager' => $manager,
        ]);
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

    public function h_store(Request $request)
    {
        try
        {
            $this->h_managerService->saveData($request);

            return redirect()->route('manager.index')->with('success', 'Successfully Add New Data');
        }
        catch(Throwable $e)
        {
            return $e->getMessage();
        }
    }

    public function edit($id)
    {
        $manager = $this->managerService->editData($id);

        return view('pages.dashboard.manager.edit', [
            'manager'    => $manager
        ]);
    }

    public function h_edit($id)
    {
        $hierarchy = $this->h_managerService->editData($id);
        $supervisor = $this->supervisorService->getCreateEdit();
        $manager = $this->managerService->getCreateEdit();

        return view('pages.dashboard.manager.hierarchy.edit', [
            'hierarchy' => $hierarchy,
            'supervisor' => $supervisor,
            'manager' => $manager,
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

    public function h_update(Request $request, $id)
    {
        try
        {
            $this->h_managerService->updateData($request, $id);

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

    public function h_destroy($id)
    {
        try
        {
            $this->h_managerService->delete($id);

            return redirect()->route('manager.index')->with('success', 'Successfully Delete Data');
        }
        catch (Throwable $e)
        {
            return $e->getMessage();
        }
    }
}
