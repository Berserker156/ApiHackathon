<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rols extends Model
{
    use HasFactory;
    protected $fillable = ["nombre_rol", "enable"];
    public function users(): HasOne
    {
        return $this->hasOne(Users::class);
    }
}
