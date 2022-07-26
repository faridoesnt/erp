<?php

namespace App\Http\Controllers;

use App\Http\Services\ManagerKaryawan\ManagerKaryawanService;

class ManagerKaryawanController extends Controller
{
    protected $managerKaryawanService;

    public function __construct(ManagerKaryawanService $managerKaryawanService)
    {
        $this->managerKaryawanService = $managerKaryawanService;
    }

    public function destroy($id)
    {
        try 
        {
            $this->managerKaryawanService->delete($id);

            return redirect()->back()->with('success', 'Successfully Delete Data');
        } 
        catch (\Throwable $th) 
        {
            throw $th;
        }
    }
}
