<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Notification;

class NotificationTemplate extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'notification_templates';

    protected $fillable = [
        'type',
        'templateText',
    ];

    // Relationship: A notification template can have many notifications
    public function notifications()
    {
        return $this->hasMany(Notifications::class);
    }
}
