<?php

namespace App\Livewire\Pages\Events;

use Livewire\Attributes\On;
use Livewire\Component;
use App\Models\EventCategory;

class EventCategories extends Component
{
    public $banner;
    public $bannerStyle;

    public $categories = [];
    public $headers = [
        'id',
        'Category Name',
        'Action'
    ];
    public $eventCategoryId;

    public function mount($id = null): void
    {
        error_log('EventCategory.php mount is triggered');

        // Log or handle the memberId as needed
        error_log('received eventCategoryId from eventCategoryId table: ' . $id);

        $this->eventCategoryId = $id;
        $this->getEventCategory();
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

    #[On('delete')]
    public function deleteEventCategory($id)
    {
        try {
            // Find the event by ID
            $category= EventCategory::findOrFail($id);

            // Delete the event
            $category->delete();

            // Success message
            $this->banner = 'Event Category deleted successfully!';
            $this->bannerStyle = 'success'; // You can use 'danger', 'warning', etc.

            return redirect()->route('event-category'); // Redirect after successful deletion
        } catch (\Exception $e) {
            // Handle any errors during the event deletion process

            $this->banner = 'Error deleting Event Category';
            $this->bannerStyle = 'danger'; // You can use 'danger', 'warning', etc.
            session()->flash('error', 'Error deleting Event Category: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.pages.events.event-categories');
    }
}
