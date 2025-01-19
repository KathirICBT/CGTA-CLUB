<?php

namespace App\Livewire\Pages\Events;

use App\Enums\EventVisibility;
use App\Models\Event;
use App\Models\EventCategory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Redirect;
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
    public $event_type = 'hello';
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
    public $banner;
    public $bannerStyle;
    // Validation rules
    public $categories = [];
    public $isForMembers = false;

    public function mount($id = null)
    {
        // Manually access the query parameter


        // Log or handle the memberId as needed
        error_log('received eventId from event table: ' . $id);

        $this->eventId = $id;
        if ($id) {
            $this->show($id);
        }

        $this->getEventCategory();
    }

    // This method will be called when the dropdown changes
    public function updateEventType()
    {
        // You can manually update or log the event_type here for debugging
        error_log('Event Type Updated: ' .  $this->event_type);

         // Set the flag to true if 'customers' is selected
         $this->isForMembers = $this->event_type === 'customers';
         if ($this->isForMembers) {
            // Reset attributes to their default values
            $this->price = 0;
            $this->sponsor_price = 0;
            $this->paid_free = 'free';
            $this->release_date = null; // Use null to represent "no date"
            $this->closing_date = null;
            $this->user_limit = 0;
            $this->user_limit_per_registrants = 0;
            $this->location = ''; // Empty string
        } else { 
            $this->event_url = '';
        }
    }

    public function submitForm()
    {
        $this-> rules = [
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'eventCategory' => 'required|exists:event_categories,id',
            'start_date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_date' => 'required|date',
            'end_time' => 'required|date_format:H:i',
            'price' => 'nullable|numeric|min:0',
            'sponsor_price' => 'nullable|numeric|min:0',
            'visibility' => 'required|in:members,allUsers', // Convert enum to string
            'release_date' => 'nullable|date',
            'closing_date' => 'nullable|date',
            'event_url' => 'nullable|url|max:255',
            'location' => 'nullable|string|max:255',
            'user_limit' => 'nullable|integer',
            'paid_free' => 'required|in:paid,free',
            'user_limit_per_registrants' => 'nullable|integer',
            'photo' => 'nullable|image|max:10240', // Example, if handling photo upload
            'event_type' => 'required|in:customers,admin',
        ];

        error_log('submitForm event is triggered');

        error_log('Event Type: ' . json_encode($this->event_type));



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
                'event_category_id' => $this->eventCategory,
                'start_date' => $this->start_date,
                'start_time' => $this->start_time,
                'end_date' => $this->end_date,
                'end_time' => $this->end_time,
                'price' => $this->price, 
                'sponsor_price' => $this->sponsor_price, 
                'event_type' => $this->event_type, 
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

                return Redirect::route('events');

            } else {
                // Create operation
                Event::create($data);
                session()->flash('message', 'Event created successfully!');
                return Redirect::route('events');

            }

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
            $this->eventCategory = $event->event_category_id ?? '';
            $this->start_date = $event->start_date ?? null;
            $this->start_time = Carbon::parse($event->start_time)->format('H:i'); // Ensure time format
            $this->end_date = $event->end_date ?? null;
            $this->end_time = Carbon::parse($event->end_time)->format('H:i'); // Ensure time format
            $this->price = $event->price ?? null; // New field for price
            $this->sponsor_price = $event->sponsor_price ?? null; // New field for price
            $this->event_type = $event->event_type->value ?? ''; // New field for event_type
            $this->visibility = $event->visibility->value ?? '';
            $this->release_date = $event->release_date ?? null;
            $this->closing_date = $event->closing_date ?? null;
            $this->event_url = $event->event_url ?? '';
            $this->location = $event->location ?? '';
            $this->user_limit = $event->user_limit ?? null;
            $this->paid_free = $event->paid_free ?? '';
            $this->user_limit_per_registrants = $event->user_limit_per_registrants ?? null;
            $this->photoUrl = $event->photo ? asset('storage/' . $event->photo) : null;

             // Set the flag to true if 'customers' is selected
            $this->isForMembers =$event->event_type->value === 'customers';

            error_log('Event successfully fetched from database');
        } catch (\Exception $e) {
            session()->flash('error', 'Error fetching event: ' . $e->getMessage());
            error_log('Error fetching event: ' . $e->getMessage());
        }
    }

    public function getEventCategory()
    {
        error_log('categories.php getEventCategory() is triggered');

        try {

            error_log('Type of $categorys: ' . gettype($this->categories));

            // Fetch and map categories directly
            $this->categories = EventCategory::all()->map(function ($category) {
                return $category;
            });

            // Log the categories as a JSON string to make sure the data is being retrieved correctly
            error_log('Retrieved categoriess: ' . json_encode($this->categories));


        } catch (\Exception $e) {
            // Log the error message if something goes wrong
            error_log('Error fetching categories: ' . $e->getMessage());
        }
    }



    public function render()
    {
        return view('livewire.pages.events.event-form');
    }
}
