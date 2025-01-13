<?php

namespace App\Livewire\Pages\Events\EventCategoryComp;

use App\Models\Event;
use App\Models\EventCategory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Redirect;
use Livewire\Attributes\On;
use Livewire\Component;

class EventCategoryFormComponent extends Component
{

    public string $name;
    public $eventCategoryId;

    public function mount($id = null)
    {
        // Log or handle the memberId as needed
        error_log('received eventId from event table: ' . $id);


    }

    public function submitForm()
    {
        $this-> rules = [
            'name' => 'required|string|max:255',
        ];

        error_log('submitForm event is triggered');
        $this->validate();
        error_log('event data are validated: ' );
        try {

            // Prepare the data array
            $data = [
                'name' => $this->name,
            ];

            // Check if it's an update or create operation
            if ($this->eventCategoryId) {
                // Update operation
                $eventCategory = EventCategory::findOrFail($this->eventCategoryId);
                $eventCategory->update($data);

                $this->banner = 'Event Category updated successfully!';
                $this->bannerStyle = 'success'; // You can use 'danger', 'warning', etc.

                return Redirect::route('event-category');

            } else {
                // Create operation
                EventCategory::create($data);
                session()->flash('message', 'Event created successfully!');
                return Redirect::route('event-category');

            }

        } catch (\Exception $e) {
            // Handle any errors during the event creation process
            error_log('Error creating event: ' . $e->getMessage());
            session()->flash('error', 'There was an error creating the event.');
        }
    }

    #[On('edit')]
    public function assignId($id = null){
        $this->eventCategoryId = $id;
        if ($id) {
            $this->show($id);
        }
    }

    public function show($id = null)
    {
        error_log('show() triggered in EventCategoryForm    .php');
        error_log('Received eventId: ' . $id);

        try {
            // Fetch the event directly from the database using Eloquent
            $event = EventCategory::findOrFail($id);

            // Map the event data to component fields
            $this->name = $event->name ?? '';


            error_log('Event EventCategory fetched from database');
        } catch (\Exception $e) {
            session()->flash('error', 'Error fetching EventCategory: ' . $e->getMessage());
            error_log('Error fetching EventCategory: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.pages.events.event-category-comp.event-category-form-component');
    }
}
