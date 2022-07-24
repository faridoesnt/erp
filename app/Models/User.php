<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'roles',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function karyawan()
    {
        return $this->hasMany(Hierarchy::class, 'karyawan_id', 'id')
                    ->where('roles', 'Karyawan');
    }
    
    public function manager()
    {
        return $this->hasMany(Hierarchy::class, 'manager_id', 'id')
                    ->where('roles', 'Manager');;
    }

    public function supervisor()
    {
        return $this->hasMany(Hierarchy::class, 'supervisor_id', 'id')
                    ->where('roles', 'Supervisor');
    }
}
