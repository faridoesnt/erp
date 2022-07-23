<?php

namespace App\Http\Controllers;

use Throwable;
use App\Http\Requests\UserRequest;
use App\Http\Services\Supervisor\SupervisorService;

class SupervisorController extends Controller
{
    protected $supervisorService;

    public function __construct(SupervisorService $supervisorService)
    {
        $this->supervisorService = $supervisorService;
    }

    public function index()
    {
        $supervisor = $this->supervisorService->getAll();

        return view('pages.dashboard.supervisor.index', [
            'supervisor' => $supervisor
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
