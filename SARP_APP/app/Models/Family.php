<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Beneficiary;

class Family extends Model
{
    use HasFactory;

    public function beneficiary()
    {
        return $this->belongsTo(Beneficiary::class);
    }
    //one benificiary can have many family members , 'beneficiary_id', 'id'

}
