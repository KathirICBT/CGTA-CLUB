<?php

namespace App\Livewire\Pages\Events\EventCategoryComp;

use Illuminate\Support\Facades\Redirect;
use Livewire\Attributes\On;
use Livewire\Component;

class EventCategoryTableComponent extends Component
{

    // Property to hold data (usually passed from parent)
    public $categories = [];

    // Property to hold table headers, can be defined based on data
    public array $headers = [];


//    public function edit($id)
//    {
//        // Log the ID and form type for testing
//        error_log("Dispatching event category-edit with ID: $id");
//
//        // Redirect to the MemberForm route with the ID as a parameter
//        return Redirect::route('event-category', ['id' => $id]);
//    }

    public function mount($categories, $headers = []): void
    {
        // Initialize data and headers
        $this->categories = $categories;
        $this->headers = $headers;

        // Directly set categories without photo_url logic
        $this->categories = collect($categories)->map(function ($category) {
            return $category;
        });

        // Log the data along with its type
        foreach ($this->categories as $key => $category) {
            error_log("Key: $key, Type: " . gettype($category) . ", Value: " . print_r($category, true));
        }
    }

    public function render()
    {
        return view('livewire.pages.events.event-category-comp.event-category-table-component');
    }
}
