<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable; 

class Notifications extends Model
{
    use HasFactory, Notifiable;
    public $timestamps = false;

    protected $table = 'notifications';
    
    protected $fillable = [
        'memberId',
        'NotificationTemplateId',
        'TemplateData',
        'is_read',
        'sent_at',
        'read_at',
    ] ;

    // Relationship: A notification belongs to one member
    public function member()
    {
        return $this->belongsTo(Member::class, 'memberId');
    }

    protected $casts = [
        'TemplateData' => 'array', // Cast TemplateData as an array for JSON data
    ];

    // Relationship: A notification belongs to one notification template
    public function template()
    {
        return $this->belongsTo(NotificationTemplate::class, 'NotificationTemplateId');
    }
}
