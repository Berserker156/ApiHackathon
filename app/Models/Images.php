<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    use HasFactory;
    protected $fillable = ["imagen"];
    public function products()
    {
        return $this->hasOne(Products::class)->withTrashed();
    }
}
