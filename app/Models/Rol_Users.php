<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol_Users extends Model
{
    use HasFactory;
    public function users(): HasOne
    {
        return $this->hasOne(Users::class);
    }
    public function rols(): HasOne
    {
        return $this->hasOne(Rols::class);
    }
}
