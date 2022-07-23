<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Throwable;
use App\Http\Services\Karyawan\KaryawanService;

class KaryawanController extends Controller
{
    protected $karyawanService;

    public function __construct(KaryawanService $karyawanService)
    {
        $this->karyawanService = $karyawanService;
    }

    public function index()
    {
        $karyawan = $this->karyawanService->getAll();

        return view('pages.dashboard.karyawan.index', [
            'karyawan' => $karyawan
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
