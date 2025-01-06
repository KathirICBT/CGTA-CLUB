<?php

namespace App\Livewire\Pages\Events;

use App\Enums\EventVisibility;
use App\Models\Event;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class EventForm extends Component
{
    use WithFileUploads;

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
    public $timezone;
    public $visibility;
    public $release_date;
    public $closing_date;
    public $event_url;
    public $location;
    public $user_limit;
    public $paid_free;
    public $user_limit_per_registrants;
    public $photoUrl; // For the full URL of the photo
    public $banner;
    public $bannerStyle;
    // Validation rules


    public function mount($eventId = null)
    {
        // Manually access the query parameter
        $this->eventId = request()->query('eventId');

        // Log or handle the memberId as needed
        error_log('received eventId from query: ' . $this->eventId);

        if ($this->eventId) {
            $this->show($this->eventId);
        }
    }

    public function submitForm()
    {
        $this-> rules = [
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'eventCategory' => 'required|string|max:100',
            'start_date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_date' => 'required|date',
            'end_time' => 'required|date_format:H:i',
            'timezone' => 'required|string|max:50',
            'visibility' => 'required|in:members,allUsers', // Convert enum to string
            'release_date' => 'required|date',
            'closing_date' => 'required|date',
            'event_url' => 'nullable|url|max:255',
            'location' => 'nullable|string|max:255',
            'user_limit' => 'nullable|integer',
            'paid_free' => 'required|in:paid,free',
            'user_limit_per_registrants' => 'nullable|integer',
            'photo' => 'nullable|image|max:10240', // Example, if handling photo upload
        ];

        error_log('submitForm event is triggered');
        $this->validate();
        error_log('event data are validated: ' );
        try {
            // Store the photo and get the relative path
            $photoPath = $this->photo ? $this->photo->store('photos', 'public') : null;

            // Log the photo path
            error_log('Stored photo path: ' . ($photoPath ?? 'No photo uploaded'));

            // Prepare the data array
            $data = [
                'title' => $this->title,
                'description' => $this->description,
                'eventCategory' => $this->eventCategory,
                'start_date' => $this->start_date,
                'start_time' => $this->start_time,
                'end_date' => $this->end_date,
                'end_time' => $this->end_time,
                'timezone' => $this->timezone,
                'visibility' => $this->visibility,
                'release_date' => $this->release_date,
                'closing_date' => $this->closing_date,
                'event_url' => $this->event_url,
                'location' => $this->location,
                'user_limit' => $this->user_limit,
                'paid_free' => $this->paid_free,
                'user_limit_per_registrants' => $this->user_limit_per_registrants,
                'photo' => $photoPath, // This will be null for create if no photo is uploaded
            ];

            // Check if it's an update or create operation
            if ($this->eventId) {
                // Update operation
                $event = Event::findOrFail($this->eventId);
                $data['photo'] = $photoPath ?? $event->photo; // Retain existing photo if no new one is uploaded
                $event->update($data);

                $this->banner = 'Event updated successfully!';
                $this->bannerStyle = 'success'; // You can use 'danger', 'warning', etc.
//                session()->flash('message', 'Event updated successfully!');
            } else {
                // Create operation
                Event::create($data);
                session()->flash('message', 'Event created successfully!');
            }

            // Success message
            session()->flash('message', 'Event created successfully!');
//            return redirect()->route('events'); // Redirect after successful event creation

        } catch (\Exception $e) {
            // Handle any errors during the event creation process
            error_log('Error creating event: ' . $e->getMessage());
            session()->flash('error', 'There was an error creating the event.');
        }
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


            $this->timezone = $event->timezone ?? '';
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
        return view('livewire.pages.events.event-form');
    }
}
