<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSellMan extends Model
{
    use HasFactory;
    public function products(): HasOne
    {
        return $this->hasOne(Products::class);
    }
    public function users(): HasOne
    {
        return $this->hasOne(Users::class);
    }
}
