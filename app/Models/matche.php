<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class matche extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function goals()
    {
        return $this->hasMany(goals::class);
    }
}
