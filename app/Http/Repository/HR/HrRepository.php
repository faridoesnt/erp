<?php

namespace App\Http\Repository\HR;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Repository\HR\HrRepositoryInterface;

class HrRepository implements HrRepositoryInterface
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getID()
    {
        return $this->user->where('roles', 'HR')->where('id', Auth::user()->id)->first();
    }
}