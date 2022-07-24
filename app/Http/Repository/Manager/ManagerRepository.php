<?php

namespace App\Http\Repository\Manager;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Repository\Manager\ManagerRepositoryInterface;

class ManagerRepository implements ManagerRepositoryInterface
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getAll()
    {
        return $this->user->where('roles', 'Manager')->paginate(10);
    }

    public function getID()
    {
        return $this->user->where('roles', 'Manager')->where('id', Auth::user()->id)->first();
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