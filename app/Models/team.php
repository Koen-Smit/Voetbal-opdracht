<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class team extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function matche()
    {
        return $this->hasMany(matche::class);
    }
}
