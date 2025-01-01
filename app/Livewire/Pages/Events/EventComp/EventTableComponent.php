<?php

namespace App\Livewire\Pages\Events\EventComp;

use Illuminate\Support\Facades\Redirect;
use Livewire\Attributes\On;
use Livewire\Component;

class EventTableComponent extends Component
{
    // Property to hold data (usually passed from parent)
    public $datas = [];

    // Property to hold table headers, can be defined based on data
    public array $headers = [];

    #[On('editMember')]
    public function edit($id)
    {
        // Log the ID and form type for testing
        error_log("Dispatching event-edit with ID: $id");

        // Redirect to the MemberForm route with the ID as a parameter
        return Redirect::route('event-form', ['id' => $id]);
    }

    #[On('deleteMember')]
    public function deleteMember($id): void
    {
        // Log the ID for testing
        error_log("Dispatching member-delete with ID: $id");

        // Dispatch an event with the member's ID
        $this->dispatch('member-delete', id: $id);
    }

    public function mount($datas, $headers = []): void
    {
        // Initialize data and headers
        $this->datas = $datas;
        $this->headers = $headers;

        // Log the data along with its type
        foreach ($this->datas as $key => $data) {
            error_log("Key: $key, Type: " . gettype($data) . ", Value: " . print_r($data, true));
        }
    }

    public function render()
    {
        return view('livewire.pages.events.event-comp.event-table-component');
    }
}
