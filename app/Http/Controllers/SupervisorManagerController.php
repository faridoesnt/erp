<?php

namespace App\Http\Controllers;

use App\Http\Services\SupervisorManager\SupervisorManagerService;

class SupervisorManagerController extends Controller
{
    protected $supervisorManagerService;

    public function __construct(SupervisorManagerService $supervisorManagerService)
    {
        $this->supervisorManagerService = $supervisorManagerService;
    }

    public function destroy($id)
    {
        try 
        {
            $this->supervisorManagerService->delete($id);

            return redirect()->back()->with('success', 'Successfully Delete Data');
        } 
        catch (\Throwable $th) 
        {
            throw $th;
        }
    }
}
