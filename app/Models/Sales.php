<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;
    public function users(): HasOne
    {
        return $this->hasOne(Users::class);
    }
    public function products(): HasOne
    {
        return $this->hasOne(Products::class);
    }
}
