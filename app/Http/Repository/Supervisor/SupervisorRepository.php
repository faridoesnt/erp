<?php

namespace App\Http\Repository\Supervisor;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Repository\Supervisor\SupervisorRepositoryInterface;

class SupervisorRepository implements SupervisorRepositoryInterface
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getAll()
    {
        return $this->user->where('roles', 'Supervisor')->paginate(10);
    }

    public function getCreateEdit()
    {
        return $this->user->where('roles', 'Supervisor')->get();
    }

    public function getID()
    {
        return $this->user->where('roles', 'Supervisor')->where('id', Auth::user()->id)->first();
    }

    public function save($data)
    {
        $user = new $this->user;

        $user->name     = $data['name'];
        $user->email    = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->roles    = $data['roles'];

        $user->save();

        return $user;
    }

    public function edit($id)
    {
        $user = $this->user->findOrfail($id);

        return $user;
    }

    public function update($request, $id)
    {
        $user = $this->user->findOrfail($id);

        $user->update([
            'name'  => $request->name,
            'email' => $request->email,
        ]);

        return $user;
    }

    public function delete($id)
    {
        $user = $this->user->findOrfail($id);

        $user->delete();

        return $user;
    }
}