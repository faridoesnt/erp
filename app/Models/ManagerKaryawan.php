<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManagerKaryawan extends Model
{
    use HasFactory;

    protected $table = 'manager_karyawan';

    protected $guarded = ['id'];

    public function manager()
    {
        return $this->belongsTo(User::class, 'manager_id', 'id');
    }

    public function karyawan()
    {
        return $this->belongsTo(User::class, 'karyawan_id', 'id');
    }
    
}
