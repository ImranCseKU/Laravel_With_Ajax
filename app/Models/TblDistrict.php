<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TblDistrict extends Model
{
    protected $fillable = [
        'name', 'phone_extension','parent_id',
    ];


    public function thanas(){
        return $this->hasMany(Tblthana::class, 'parent_id');
    }



}
