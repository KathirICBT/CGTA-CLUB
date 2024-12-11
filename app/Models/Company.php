<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $fillable = [
        'member_id', 'package_id', 'companyName', 'email', 'phonenumber',
        'address', 'joinDate', 'services', 'bio', 'logoImg', 'status',
        'region_id', 'city'
    ];

    public function package()
    {
        return $this->belongsTo(Package::class, 'package_id');
    }
    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id');
    }
    public function region()
    {
        return $this->belongsTo(Region::class, 'region_id');
    }
}
