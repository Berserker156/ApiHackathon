<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Details extends Model
{
    use HasFactory;
    protected $fillable = ["Cantidad","subtotal","descuento"];
    public function sales()
    {
        return $this->hasOne(Sales::class)->withTrashed();
    }
    public function Products()
    {
        return $this->hasOne(Products::class)->withTrashed();
    }
}
