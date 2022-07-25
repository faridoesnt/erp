<?php

namespace App\Http\Repository\Supervisor;

use App\Models\Hierarchy;
use Illuminate\Support\Facades\Auth;

class H_SupervisorRepository implements H_SupervisorRepositoryInterface
{
    protected $hierarchy;

    public function __construct(Hierarchy $hierarchy)
    {
        $this->hierarchy = $hierarchy;
    }

    public function getManager()
    {
        $manager = $this->hierarchy->with(['supervisor', 'manager'])->where('supervisor_id', Auth::user()->id)->get();

        return $manager;
    }
}