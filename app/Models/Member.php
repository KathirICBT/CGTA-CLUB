<?php

namespace App\Models;

use App\Enums\MemberStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Member extends Model
{
    use HasFactory, Notifiable;

    public $timestamps = false;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'date_of_birth',
        'join_date',
        'photo',
        'bio',
        'status',
        'membership_level', // New attribute
        'password', // New attribute
        'renewal_date', // New attribute
    ];

    // Cast the 'status' attribute to the MemberStatus enum
    protected $casts = [
        'status' => MemberStatus::class,
    ];

    // Relationship: A member belongs to many notifications
    public function notifications()
    {
        return $this->hasMany(Notifications::class, 'memberId');
    }

}
