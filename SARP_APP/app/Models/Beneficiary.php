<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Family;


class Beneficiary extends Model
{
    use HasFactory;


    public function family()
    {
        return $this->hasMany(Family::class, 'beneficiary_id', 'id');
    }
}
