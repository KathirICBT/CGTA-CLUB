<?php

namespace App\Livewire\Pages\Events;

use App\Models\Event;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Component;

class Events extends Component
{
    public $events = [];
    public string $searchQuery = '';
    public $allEvents = [];

    public $isTableView = true; // Default is table view

    public $eventId;


    public $banner;
    public $bannerStyle;
    public $headers = [
        'Title',
        'Category',
        'Start Date',
        'Start Time',
        'Visibility',
        'Release Date',
        'Closing Date',
        'Paid / Free',
        'User Limit',
        'Registrants Guests',
    ];
    public function mount(): void
    {
        error_log('Events.php mount is triggered');
        $this->getEvents();
    }

    public function getEvents()
    {

        $this->allEvents = Event::all()->map(function ($event) {
            $event['photo_url'] = isset($event['photo']) && $event['photo']
                ? (str_contains($event['photo'], 'http') ? $event['photo'] : url('storage/' . $event['photo']))
                : null;
            $event['category_name'] = $event->category ? $event->category->name : 'N/A';
            return $event;
        })->toArray();

        // Initially set events to allEvents
        $this->events = $this->allEvents;

    }

    public function triggerSearch()
    {
        $this->events = array_filter($this->allEvents, function ($event) {
            $query = strtolower($this->searchQuery);

            foreach ($event as $key => $value) {
                if (is_scalar($value) && str_contains(strtolower((string) $value), $query)) {
                    return true; // If any attribute matches, include this event
                }
            }
            return false;
        });

        if (empty($this->searchQuery)) {
            $this->events = $this->allEvents;
        }
    }

//    public function getEvents()
//    {
//        error_log('Events.php getUsers() is triggered');
//        error_log('searchQuery: ' . $this->searchQuery);
//
//        try {
//            // Fetch all events from the database without filtering (before searchQuery interference)
//            $allEvents = Event::all();
//            error_log('Number of events before applying searchQuery: ' . $allEvents->count());
//
//
//            $this->events = Event::when($this->searchQuery, function ($query) {
//                // Filter events by the search term
//                return $query->where('title', 'like', '%' . $this->searchQuery . '%');
//            })
//                ->get()
//                ->map(function ($event) {
//                    $event['photo_url'] = isset($event['photo']) && $event['photo']
//                        ? (str_contains($event['photo'], 'http') ? $event['photo'] : url('storage/' . $event['photo']))
//                        : null;
//                    $event['category_name'] = $event->category ? $event->category->name : 'N/A';
//                    return $event;
//                });
//
//            error_log('Number of events after applying searchQuery: ' . $this->events->count());
//
//        } catch (\Exception $e) {
//            error_log('Error fetching events: ' . $e->getMessage());
//        }
//    }

    public function toggleView($view)
    {
        $this->isTableView = $view === 'table'; // Toggle between 'table' and 'card'
        $this->banner = null;
        $this->bannerStyle = null;
    }

    public function editMember($eventId, $action)
    {

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

    #[On('delete')]
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
