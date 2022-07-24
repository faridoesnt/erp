<?php

namespace App\Http\Controllers;

use Throwable;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Services\Karyawan\KaryawanService;
use App\Http\Services\Karyawan\H_KaryawanService;
use App\Http\Services\Manager\ManagerService;

class KaryawanController extends Controller
{
    protected $karyawanService;
    protected $h_karyawanService;
    protected $managerService;

    public function __construct(KaryawanService $karyawanService, H_KaryawanService $h_karyawanService, ManagerService $managerService)
    {
        $this->karyawanService = $karyawanService;
        $this->h_karyawanService = $h_karyawanService;
        $this->managerService = $managerService;
    }

    public function index()
    {
        $h_karyawan = $this->h_karyawanService->getAll();
        $karyawan = $this->karyawanService->getAll();

        return view('pages.dashboard.karyawan.index', [
            'karyawan' => $karyawan,
            'h_karyawan' => $h_karyawan,
        ]);
    }

    public function create()
    {
        return view('pages.dashboard.karyawan.create');
    }

    public function h_create()
    {
        $karyawan = $this->karyawanService->getCreateEdit();
        $manager = $this->managerService->getCreateEdit();

        return view('pages.dashboard.karyawan.hierarchy.create', [
            'karyawan' => $karyawan,
            'manager' => $manager,
        ]);
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

    public function h_store(Request $request)
    {
        try
        {
            $this->h_karyawanService->saveData($request);

            return redirect()->route('karyawan.index')->with('success', 'Successfully Add New Data');
        }
        catch(Throwable $e)
        {
            return $e->getMessage();
        }
    }

    public function edit($id)
    {
        $karyawan = $this->karyawanService->editData($id);

        return view('pages.dashboard.karyawan.edit', [
            'karyawan'    => $karyawan
        ]);
    }

    public function h_edit($id)
    {
        $hierarchy = $this->h_karyawanService->editData($id);
        $karyawan = $this->karyawanService->getCreateEdit();
        $manager = $this->managerService->getCreateEdit();

        return view('pages.dashboard.karyawan.hierarchy.edit', [
            'hierarchy' => $hierarchy,
            'karyawan' => $karyawan,
            'manager' => $manager,
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

    public function h_update(Request $request, $id)
    {
        try
        {
            $this->h_karyawanService->updateData($request, $id);

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

    public function h_destroy($id)
    {
        try
        {
            $this->h_karyawanService->delete($id);

            return redirect()->route('karyawan.index')->with('success', 'Successfully Delete Data');
        }
        catch (Throwable $e)
        {
            return $e->getMessage();
        }
    }
}
