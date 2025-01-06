<?php

namespace App\Livewire\Pages\Events\EventComp;

use Illuminate\Support\Facades\Redirect;
use Livewire\Component;

class EventCard extends Component
{
    public $events = [];

    public function editMember($id)
    {
        // Log the ID and form type for testing
        error_log("Dispatching member-edit with ID: $id");

        // Redirect to the MemberForm route with the ID as a parameter
        return Redirect::route('member-form', ['id' => $id]);
    }

    public function deleteMember($id): void
    {
        // Log the ID for testing
        error_log("Dispatching member-delete with ID: $id");

        // Dispatch an event with the member's ID
        $this->dispatch('member-delete', id: $id);
    }

    // If you want to handle sorting or other actions, you can add methods or properties for those too.
    public function mount($events = null): void
    {
        error_log('mount method in MemberCard is triggered');

        // Initialize data and headers
        $this->events = collect($events)->map(function ($event) {
            $event['photo_url'] = isset($event['photo']) && $event['photo']
                ? (str_contains($event['photo'], 'http') ? $event['photo'] : url('storage/' . $event['photo']))
                : null;
            return $event;
        });

        // Log the data along with its type
        foreach ($this->events as $key => $event) {
            error_log("Key: $key, Type: " . gettype($event) . ", Value: " . print_r($event, true));
        }

    }

    public function render()
    {
        return view('livewire.pages.events.event-comp.event-card');
    }
}
