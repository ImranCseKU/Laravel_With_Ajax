<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TblDivision extends Model
{
    protected $fillable = [
        'name', 'phone_extension',
    ];
    
    public function districts(){
        return $this->hasMany(TblDistrict::class, 'parent_id');
    }
}
