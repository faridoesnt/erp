<?php

namespace App\Http\Controllers;

use App\Models\HierarchyKaryawan;
use App\Models\User;
use Illuminate\Http\Request;

class HierarchyKaryawanController extends Controller
{
    public function index()
    {
        $data = HierarchyKaryawan::with(['karyawan', 'manager'])->paginate(10);

        return view('pages.dashboard.hierarchy.karyawan.index', [
            'data'  => $data
        ]);
    }

    public function create()
    {
        $karyawan = User::where('roles', 'Karyawan')->get();
        $manager = User::where('roles', 'Manager')->get();

        return view('pages.dashboard.hierarchy.karyawan.create', [
            'karyawan' => $karyawan,
            'manager' => $manager
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'karyawan_id'   => 'required',
            'manager_id'   => 'required',
        ]);

        HierarchyKaryawan::create([
            'karyawan_id'   => $request->karyawan_id,
            'manager_id'   => $request->manager_id
        ]);

        return redirect()->route('hierarchy_karyawan.index');
    }

    public function edit($id)
    {
        $data = HierarchyKaryawan::with(['karyawan', 'manager'])->findOrfail($id);

        return view('pages.dashboard.hierarchy.karyawan.edit', [
            'data' => $data
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'karyawan_id'   => 'required',
            'manager_id'   => 'required',
        ]);

        $data = HierarchyKaryawan::findOrfail($id);

        $data->update([
            'karyawan_id'   => $request->karyawan_id,
            'manager_id'   => $request->manager_id,
        ]);

        return redirect()->route('hierarchy_karyawan.index');
    }

    public function destroy($id)
    {
        $data = HierarchyKaryawan::findOrfail($id);

        $data->delete();
        
        return redirect()->route('hierarchy_karyawan.index');
    }
}
