<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $fillable = ["product","Price","description","Stock"];

    public function category(): HasOne
    {
        return $this->hasOne(categories::class);
    }
    public function sales(): HasOne
    {
        return $this->hasOne(Sales::class);
    }
    public function users(): HasOne
    {
        return $this->hasOne(Users::class);
    }}
