<?php

namespace App\Http\Repository\Manager;

use App\Models\Hierarchy;
use Illuminate\Support\Facades\Auth;

class H_ManagerRepository implements H_ManagerRepositoryInterface
{
    protected $hierarchy;

    public function __construct(Hierarchy $hierarchy)
    {
        $this->hierarchy = $hierarchy;
    }

    public function getAll()
    {
        return $this->hierarchy->with(['manager', 'supervisor'])->paginate(10, ['*'], 'hierarchy');
    }

    public function getSupervisor()
    {
        $manager = $this->hierarchy->with(['manager', 'supervisor'])->where('manager_id', Auth::user()->id)->first();

        return $manager;
    }

    public function save($data)
    {
        $hierarchy = new $this->hierarchy;

        $hierarchy->manager_id = $data['manager_id'];
        $hierarchy->supervisor_id = $data['supervisor_id'];

        $hierarchy->save();

        return $hierarchy;
    }

    public function edit($id)
    {
        $hierarchy = $this->hierarchy->findOrfail($id);

        return $hierarchy;
    }

    public function update($data, $id)
    {
        $hierarchy = $this->hierarchy->findOrfail($id);

        $hierarchy->update([
            'manager_id'   => $data['manager_id'],
            'supervisor_id'    => $data['supervisor_id'],
        ]);

        return $hierarchy;
    }

    public function destroy($id)
    {
        $hierarchy = $this->hierarchy->findOrfail($id);

        $hierarchy->delete();

        return $hierarchy;
    }
}