<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;
    protected $fillable = ['region']; 
    public function companies()
    {
        return $this->hasMany(Company::class, 'region_id');
    }
    
}
