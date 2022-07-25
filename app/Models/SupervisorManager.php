<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupervisorManager extends Model
{
    use HasFactory;

    protected $table = 'supervisor_manager';

    protected $guarded = ['id'];

    public function supervisor()
    {
        return $this->belongsTo(User::class, 'supervisor_id', 'id');
    }
    
    public function manager()
    {
        return $this->belongsTo(User::class, 'manager_id', 'id');
    }

}
