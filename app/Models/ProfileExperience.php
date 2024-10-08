<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileExperience extends Model
{
    use HasFactory;
    protected $table = 'profile_experience';

    public function company(){
        return $this->hasOne(Company::class,'id','company_id');
    }
}
