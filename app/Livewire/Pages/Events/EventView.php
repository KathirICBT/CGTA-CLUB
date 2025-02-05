<?php

namespace App\Livewire\Pages\Events;

use App\Models\Event;
use Illuminate\Support\Carbon;
use Livewire\Component;

class EventView extends Component
{
    protected $rules;
    public $title;
    public $photo;
    public $eventId;
    public $description;
    public $eventCategory;
    public $start_date;
    public $start_time;
    public $end_date;
    public $end_time;
    public $event_type;
    public $price;
    public $sponsor_price;
    public $visibility;
    public $release_date;
    public $closing_date;
    public $event_url;
    public $location;
    public $user_limit;
    public $paid_free;
    public $user_limit_per_registrants;
    public $photoUrl; // For the full URL of the photo
    public $activeView = 'information';

    public $isTableView = true; // Default is table view

    public function mount($eventId = null)
    {
        error_log('mount is triggered from MemberView.php');
        $this->eventId = $eventId;

        error_log('received memberId from route parameter in MemberView.php: ' . $this->eventId);

        if ($this->eventId) {
            $this->show($this->eventId); // Your logic to handle the memberId
        }
    }

    public function toggleView($view)
    {
        $this->isTableView = $view === 'information'; // Toggle between 'table' and 'card'
        
        $this->activeView = $view;
    }

    public function show($eventId)
    {
        error_log('show() triggered in EventForm.php');
        error_log('Received eventId: ' . $eventId);

        try {
            // Fetch the event directly from the database using Eloquent
            $event = Event::findOrFail($eventId);

            // Map the event data to component fields
            $this->title = $event->title ?? '';
            $this->description = $event->description ?? '';
            $this->eventCategory = $event->eventCategory ?? '';
            $this->start_date = $event->start_date ?? null;
            $this->start_time = Carbon::parse($event->start_time)->format('H:i'); // Ensure time format
            $this->end_date = $event->end_date ?? null;
            $this->end_time = Carbon::parse($event->end_time)->format('H:i'); // Ensure time format
            // Log start_time and end_time values and their types
            error_log('Start Time: ' . $event->start_time); // Log value of start_time
            error_log('End Time: ' . $event->end_time); // Log value of end_time
            error_log('Start Time Type: ' . gettype($event->start_time)); // Log type of start_time
            error_log('End Time Type: ' . gettype($event->end_time)); // Log type of end_time

            
            $this->price = $event->price ?? null; // New field for price
            $this->sponsor_price = $event->sponsor_price ?? null; // New field for price
            $this->event_type = $event->event_type->value ?? ''; // New field for event_type
            $this->visibility = $event->visibility->value ?? '';

            // Log the value and type of 'visibility'
            error_log('Visibility value: ' . $this->visibility); // Check the value
            error_log('Visibility type: ' . gettype($this->visibility)); // Check the type

            $this->release_date = $event->release_date ?? null;
            $this->closing_date = $event->closing_date ?? null;
            $this->event_url = $event->event_url ?? '';
            $this->location = $event->location ?? '';
            $this->user_limit = $event->user_limit ?? null;
            $this->paid_free = $event->paid_free ?? '';
            $this->user_limit_per_registrants = $event->user_limit_per_registrants ?? null;
            $this->photoUrl = $event->photo ? asset('storage/' . $event->photo) : null;

            error_log('Event successfully fetched from database');
        } catch (\Exception $e) {
            session()->flash('error', 'Error fetching event: ' . $e->getMessage());
            error_log('Error fetching event: ' . $e->getMessage());
        }
    }


    public function render()
    {
        return view('livewire.pages.events.event-view');
    }
}
