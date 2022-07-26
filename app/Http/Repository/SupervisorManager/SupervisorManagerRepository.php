<?php

namespace App\Http\Repository\SupervisorManager;

use App\Models\SupervisorManager;
use App\Models\User;

class SupervisorManagerRepository implements SupervisorManagerRepositoryInterface
{
    protected $supervisor_manager;
    protected $user;

    public function __construct(SupervisorManager $supervisor_manager, User $user)
    {
        $this->supervisor_manager = $supervisor_manager;
        $this->user = $user;
    }

    public function getManager($id)
    {
        return $this->supervisor_manager->with(['manager'])->where('supervisor_id', $id)->get();
    }

    public function getSupervisor($id)
    {
        return $this->supervisor_manager->with(['supervisor'])->where('manager_id', $id)->get();
    }

    public function create()
    {
        $supervisor = $this->user->where('roles', 'Supervisor')->get();
        $manager = $this->user->where('roles', 'Manager')->get();

        $data['supervisor'] = $supervisor;
        $data['manager'] = $manager;

        return $data;
    }

    public function save($request)
    {
        $supervisor_manager = new $this->supervisor_manager;

        $supervisor_manager->supervisor_id = $request->supervisor_id;
        $supervisor_manager->manager_id = $request->manager_id;

        $supervisor_manager->save();

        return $supervisor_manager;
    }

    public function delete($id)
    {
        $supervisor_manager = $this->supervisor_manager->findOrfail($id);

        $supervisor_manager->delete();

        return $supervisor_manager;
    }
}