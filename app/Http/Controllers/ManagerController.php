<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Throwable;
use App\Http\Services\Manager\ManagerService;

class ManagerController extends Controller
{
    protected $managerService;

    public function __construct(ManagerService $managerService)
    {
        $this->managerService = $managerService;
    }

    public function index()
    {
        $manager = $this->managerService->getAll();

        return view('pages.dashboard.manager.index', [
            'manager' => $manager
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
