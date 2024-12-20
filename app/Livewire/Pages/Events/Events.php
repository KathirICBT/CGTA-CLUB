<?php

namespace App\Livewire\Pages\Events;

use App\Models\Event;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Events extends Component
{
    public $events = [];
    public $isTableView = true; // Default is table view

    public $eventId;

    public $banner;
    public $bannerStyle;
    public $headers = [
        'Image',
        'Title',
//        'description',
        'Category',
        'Start Date',
        'Start Time',
//        'end_date',
//        'end_time',
//        'timezone',
        'Visibility',
        'Release Date',
        'Closing Date',
//        'event_url',
//        'location',
        'User Limit',
        'Paid / Free',
        'Registrants Guests',
        'Actiion'
    ];
    public function mount(): void
    {
        error_log('Events.php mount is triggered');
        $this->getUsers();
    }

    public function getUsers()
    {
        error_log('Events.php getUsers() is triggered');

        try {
            // Fetch all events from the database
            $this->events =  Event::all();

            // Log the type of $events to see if it's a Collection or array
            error_log('Type of $events: ' . gettype($this->events));

            // Loop through each event and combine photo field into photo_url
            $this->events = $this->events->map(function ($event) {
                // Ensure each event has a full photo URL
                $event->photo_url = $event->photo ? (str_contains($event->photo, 'http') ? $event->photo : url('storage/' . $event->photo)) : null;
                return $event;
            });


            // Log the events as a JSON string to make sure the data is being retrieved correctly
            error_log('Retrieved Events: ' . json_encode($this->events));


        } catch (\Exception $e) {
            // Log the error message if something goes wrong
            error_log('Error fetching events: ' . $e->getMessage());
        }
    }

    public function toggleView($view)
    {
        $this->isTableView = $view === 'table'; // Toggle between 'table' and 'card'
        $this->banner = null;
        $this->bannerStyle = null;
    }

    public function editMember($eventId, $action)
    {
        error_log('editEvent is triggered');
        error_log('editEvent memberId is : ' . $eventId);

        if ($action === 'form') {
            // Redirect to member-form
            $url = route('event-form', ['eventId' => $eventId]);
        } elseif ($action === 'view') {
            // Redirect to member-view
            $url = route('event-view', ['eventId' => $eventId]);
        } else {
            // Default fallback or error if needed
            $url = route('events'); // or some default route
        }

        error_log('Redirecting to: ' . $url);

        return redirect($url);
    }

    public function deleteEvent($eventId)
    {
        try {
            // Find the event by ID
            $event = Event::findOrFail($eventId);

            // If the event has a photo, delete it from storage
            if ($event->photo) {
                Storage::disk('public')->delete($event->photo); // Deleting photo from storage
            }

            // Delete the event
            $event->delete();

            // Success message
            $this->banner = 'Event deleted successfully!';
            $this->bannerStyle = 'success'; // You can use 'danger', 'warning', etc.

            return redirect()->route('events'); // Redirect after successful deletion
        } catch (\Exception $e) {
            // Handle any errors during the event deletion process

            $this->banner = 'Error deleting event';
            $this->bannerStyle = 'danger'; // You can use 'danger', 'warning', etc.
            session()->flash('error', 'Error deleting event: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.pages.events.events');
    }
}
