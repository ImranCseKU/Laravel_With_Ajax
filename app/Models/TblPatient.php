<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TblPatient extends Model
{
    protected $fillable = [
        'name', 'dob','disease','cell', 'location',
    ];
}
