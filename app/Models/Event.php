<?php

namespace App\Models;

use App\Enums\EventVisibility;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'title',
        'description',
        'event_category_id',
        'start_date',
        'start_time',
        'end_date',
        'end_time',
        'timezone',
        'visibility',
        'release_date',
        'closing_date',
        'event_url',
        'location',
        'user_limit',
        'paid_free',
        'user_limit_per_registrants',
        'photo',
    ];

    // Cast the 'visibility' attribute to the EventVisibility enum
    protected $casts = [
        'visibility' => EventVisibility::class,
    ];

    // Define relationship with EventCategories
    public function category()
    {
        return $this->belongsTo(EventCategory::class, 'event_category_id');
    }
}
